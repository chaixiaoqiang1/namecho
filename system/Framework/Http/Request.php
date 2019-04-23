<?php
namespace Namecho\Framework\Http;

use \Namecho\Framework\Library\Router;

class Request
{
    public $data = [];
    public $query = [];
    public $body = [];
    public $path = '';

    public function __construct()
    {
        $this->data = Router::getInstance()->getParam();
        $this->query = isset($_GET) ? $_GET : [];
        $this->body = isset($_POST) ? $_POST : [];
        $this->path = BASE_DIR . 'public/';
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
