<?php
namespace Namecho\Framework\Library;

class Router
{
    private static $instance = null;
    private $routes = [];
    private $uri = [];

    private function __construct()
    {
        $this->routes = \config('routes');
        $this->uri = $this->uri();
    }

    private function __clone()
    {}

    public static function getInstance()
    {
        if (!(self::$instance instanceof Router)) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    private function pathInfo()
    {
        $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
        return \trim($pathInfo, '/');
    }

    private function uri()
    {
        $uriString = $this->pathInfo();
        foreach ($this->routes['routes'] as $key => $value) {
            $uriString = \str_replace($key, $value, $uriString);
        }
        return \explode('/', $uriString);
    }

    public function getController()
    {
        return !empty($this->uri[0]) ? $this->uri[0] : $this->routes['default_controller'];
    }

    public function getMethod()
    {
        return !empty($this->uri[1]) ? $this->uri[1] : $this->routes['default_method'];
    }

    public function getParam()
    {
        return !empty($this->uri[2]) ? \array_slice($this->uri, 2) : [];
    }
}
