<?php
namespace Namecho\Framework;

use \Namecho\Framework\Library\Medoo;

class Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = new Medoo(\config('database'));
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
