<?php
namespace Namecho\Framework\Library;

class Load
{
    private static $instance = null;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (!(self::$instance instanceof Load)) {
            self::$instance = new Load();
        }
        return self::$instance;
    }

    public function model($model)
    {
        $key = \ucfirst($model);
        $class = '\App\Models\\' . $key;
        if (\class_exists($class)) {
            $this->$key = new $class();
        } else {
            \error($key . ' model 不存在');
        }
    }

    public function service($service)
    {
        $key = \ucfirst($service);
        $class = '\App\Services\\' . $key;
        if (\class_exists($class)) {
            $this->$key = new $class();
        } else {
            \error($key . ' service 不存在');
        }
    }

    public function helper($library)
    {
        $key = \ucfirst($library);
        $class = '\Namecho\Helper\\' . $key;
        if (\class_exists($class)) {
            $key = \lcfirst($library);
            $this->$key = new $class();
        } else {
            \error($key . ' Helper 不存在');
        }
    }

    public function __get($name)
    {
        \error($name . ' 属性不存在');
    }

    public function __call($name, $arguments)
    {
        \error($name . ' 函数不存在');
    }
}
