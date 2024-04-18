<?php

namespace chelistico\phpframeworkcore;

use chelistico\phpframeworkcore\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\phpframeworkcore
 */
class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \chelistico\phpframeworkcore\middlewares\BaseMiddleware[]
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
     * @return \chelistico\phpframeworkcore\middleware\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}