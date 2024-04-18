<?php

namespace chelistico\phpframeworkcore;

use chelistico\phpframeworkcore\db\DbModel;

/**
 * Class UserModel
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\phpframeworkcore
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;

}