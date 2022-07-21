<?php

namespace MvcFrameworkCourse\core;

use MvcFrameworkCourse\core\DbModel;

abstract class UserModel extends DbModel 
{
    
    abstract public function getDisplayName(): string;

}





?>