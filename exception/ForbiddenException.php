<?php
/**
 * User: chelistico
 * Date: 11/04/20241
 * Time: 09:13 AM
 */

 namespace chelistico\php-framework-core\exception;

 /**
  * Class ForbiddenException
  *
  * @author chelistico <marcelovieyra@hotmail.com>
  * @package chelistico\php-framework-core\exception
  */
class ForbiddenException extends \Exception
{
    protected $message = "You don't have permission to access this page";
    protected $code = 403;
}