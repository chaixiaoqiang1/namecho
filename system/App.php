<?php
namespace Namecho;

use \Namecho\Framework\Http\Request;
use \Namecho\Framework\Http\Response;
use \Namecho\Framework\Library\Router;

class App
{
    private static $instance = null;

    private function __construct()
    {
        if (!\config('app')['debug']) {
            \error_reporting(0);
        }
    }

    private function __clone()
    {}

    public static function getInstance()
    {
        if (!(self::$instance instanceof App)) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    public function run()
    {
        $this->dispatch();
    }

    private function dispatch()
    {
        $router = Router::getInstance();
        $controllerClass = '\App\Controllers\\' . \ucfirst($router->getController());
        if (\class_exists($controllerClass)) {
            $controllerObject = new $controllerClass();
            $method = $router->getMethod();
            if (\method_exists($controllerObject, $method)) {
                $controllerObject->$method(new Request(), new Response());
            } else {
                $this->error_controller();
            }
        } else {
            $this->error_controller();

        }
    }

    private function error_controller()
    {
        $controllerErrorClass = '\App\Controllers\\' . \ucfirst(\config('routes')['default_error_controller']);
        if (\class_exists($controllerErrorClass)) {
            $controllerErrorObject = new $controllerErrorClass();
            $defaultMethod = \config('routes')['default_method'];
            if (\method_exists($controllerErrorObject, $defaultMethod)) {
                $controllerErrorObject->$defaultMethod(new Request(), new Response());
            } else {
                \error('默认函数未定义');
            }
        } else {
            \error('404控制器不存在');
        }
    }
}
