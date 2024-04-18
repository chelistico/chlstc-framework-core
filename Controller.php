<?php

namespace chelistico\php-framework-core;

use chelistico\php-framework-core\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\php-framework-core
 */
class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \chelistico\php-framework-core\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return \chelistico\php-framework-core\middleware\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}