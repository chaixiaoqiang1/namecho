<?php
namespace Namecho\Helper;

class Http
{
    protected $curl = null;

    public function __construct()
    {
        $this->curl = \curl_init();
    }

    public function get($url)
    {
        \curl_setopt($this->curl, CURLOPT_URL, $url);
        \curl_setopt($this->curl, CURLOPT_HEADER, 1);
        \curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        \curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        return \curl_exec($this->curl);
    }

    public function post($url, $data = null, $json = false)
    {
        \curl_setopt($this->curl, CURLOPT_URL, $url);
        \curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        \curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 1);
        if (!empty($data)) {
            \curl_setopt($this->curl, CURLOPT_POST, 1);
            \curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 60);
            \curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
            if ($json) {
                \curl_setopt($this->curl, CURLOPT_HEADER, 0);
                \curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8', 'Content-Length: ' . \strlen($data)]);
            }
        }
        \curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        return \curl_exec($this->curl);
    }

    public function __destruct()
    {
        \curl_close($this->curl);
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
