<?php
/**
 * User: chelistico
 * Date: 11/04/20241
 * Time: 09:13 AM
 */

 namespace app\core\exception;

 /**
  * Class ForbiddenException
  *
  * @author chelistico <marcelovieyra@hotmail.com>
  * @package app\core\exception
  */
class ForbiddenException extends \Exception
{
    protected $message = "You don't have permission to access this page";
    protected $code = 403;
}