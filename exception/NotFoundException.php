<?php
/**
 * User: chelistico
 * Date: 11/04/20241
 * Time: 10:11 AM
 */

 namespace app\core\exception;

 /**
  * Class NotFoundException
  *
  * @author chelistico <marcelovieyra@hotmail.com>
  * @package app\core\exception
  */
class NotFoundException extends \Exception
{
    protected $message = "Page not found";
    protected $code = 404;
}