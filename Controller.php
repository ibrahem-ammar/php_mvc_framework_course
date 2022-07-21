<?php 


namespace MvcFrameworkCourse\core;

use MvcFrameworkCourse\core\middlewares\BaseMiddleWare;

/**
 * 
 * @package MvcFrameworkCourse\core
 */

class Controller
{
    /**
     * 
     * @var BaseMiddleWare[]
     */
    protected array $middleWares = [];

    public string $action = '';

    public string $layout = 'main';

    public function setLayout($layout)
    {
        $this->layout = $layout;
        
    }

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleWare $middleware)
    {
        $this->middleWares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return  $this->middleWares;
    }

    
}


?>