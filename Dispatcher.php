<?php 
namespace MVC;
use MVC\Request;
use MVC\Router;
class Dispatcher
{

    private $request;

    public function dispatch()
    {
        // var_dump("TA");die;
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();
        // echo $this->request->action;

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        // $name = $this->request->controller . "Controller";
        // $file = ROOT . 'Controllers/' . $name . '.php';
        // require($file);
        // $controller = new $name();

        // $controller = "MVC\\Controller\\".($this->request->controller). 'Controller';
        // $c = $this->request->controller;
        // echo $c;
        $controller = "SRC\\Controllers\\TasksController";
        return new $controller ;
    }

}
?>