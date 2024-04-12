<?php
/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 09:01 AM
 */

 namespace app\core\middlewares;

 /**
  * Class BaseMiddleware
  * 
  * @author chelistico <marcelovieyra@hotmail.com>
  * @package app\core\middlewares
  */
abstract class BaseMiddleware
{
    abstract public function execute();
}