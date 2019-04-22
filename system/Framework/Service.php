<?php
namespace Namecho\Framework;

use \Namecho\Framework\Library\Load;

class Service
{
    protected $load = null;

    public function __construct()
    {
        $this->load = Load::getInstance();
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
