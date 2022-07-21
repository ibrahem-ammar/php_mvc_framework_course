<?php 

namespace MvcFrameworkCourse\core\middlewares;

use MvcFrameworkCourse\core\Application;
use MvcFrameworkCourse\core\exception\ForbiddenException;

class AuthMiddleWare extends BaseMiddleWare
{
    public array $actions = [];

    public function __construct( array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}


?>