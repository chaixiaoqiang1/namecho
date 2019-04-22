<?php
namespace Namecho\Framework;

use \Namecho\Framework\Library\Load;

class Controller
{
    protected $load = null;

    public function __construct()
    {
        $this->load = Load::getInstance();
    }

    protected function redirect($url)
    {
        \header('Location:' . $url);
        exit;
    }

    public function __get($name)
    {
        return $this->load->$name;
    }

    public function __call($name, $arguments)
    {
        \error($name . ' 函数不存在');
    }
}
