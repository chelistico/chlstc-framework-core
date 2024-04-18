<?php

namespace chelistico\php-framework-core;

use chelistico\php-framework-core\db\DbModel;

/**
 * Class UserModel
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\php-framework-core
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;

}