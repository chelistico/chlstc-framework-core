<?php
/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 09:01 AM
 */

 namespace chelistico\phpframeworkcore\middlewares;

 /**
  * Class BaseMiddleware
  * 
  * @author chelistico <marcelovieyra@hotmail.com>
  * @package chelistico\phpframeworkcore\middlewares
  */
abstract class BaseMiddleware
{
    abstract public function execute();
}