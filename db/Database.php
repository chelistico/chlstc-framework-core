<?php

namespace chelistico\phpframeworkcore\db;

use chelistico\phpframeworkcore\Application;

/**
 * Class Database
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\phpframeworkcore\db
 */
class Database
{
    public \PDO $pdo;

    /**
     * Database constructor
     */
    public function __construct(array $config)
    {
        $host = $config['host'] ?? '';
        $port = $config['port'] ?? '3306';
        $name = $config['name'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new \PDO("mysql:host=$host;port=$port;dbname=$name", $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("SET NAMES 'utf8'");
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR.'/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className;
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Migration $migration applied");
            $newMigrations[] = $migration;
        }

        if(!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("Nothing to migrate.");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $migrationsToString = implode(
                ",",
                array_map(fn($migration) => "('$migration')", $migrations)
        );

        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES
            $migrationsToString
        ");

        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . ']' . $message . PHP_EOL;
    }
}