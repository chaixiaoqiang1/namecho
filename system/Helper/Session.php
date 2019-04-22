<?php
namespace Namecho\Helper;

class Session
{
    public function __construct()
    {
        \session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        unset($_SESSION);
        session_destroy();
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
