<?php

/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 09:05 AM
 */

namespace chelistico\phpframeworkcore\middlewares;

use chelistico\phpframeworkcore\Application;
use chelistico\phpframeworkcore\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\phpframeworkcore\middlewares
 */
class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * AuthMiddleware constructor.
     * 
     * @param array $actions
     */
    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest() &&
            (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions))
        ) {
            throw new ForbiddenException();
        }
    }
}
