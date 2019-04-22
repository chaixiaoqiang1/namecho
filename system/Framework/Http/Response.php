<?php
namespace Namecho\Framework\Http;

class Response
{
    private $viewCache = '';

    public function view($view, array $data = null)
    {
        \header('Content-Type: text/html; charset=utf-8');
        if (\is_string($view)) {
            $viewPath = BASE_DIR . 'app/Views/' . $view . '.php';
            if (\file_exists($viewPath)) {
                include $viewPath;
            } else {
                \error('页面不存在');
            }
        }
        if (\is_array($view)) {
            foreach ($view as $key => $value) {
                $viewPath = BASE_DIR . 'app/Views/' . $value . '.php';
                if (\file_exists($viewPath)) {
                    include $viewPath;
                } else {
                    \error('页面不存在');
                }
            }
        }
    }

    public function json(array $data)
    {
        \header('Content-type: application/json');
        echo \is_array($data) ? \json_encode($data) : $data;
    }

    public function download($path)
    {
        if (\file_exists($path) and \is_file($path)) {
            \set_time_limit(0);
            $file = \fopen($path, 'r');
            $size = \filesize($path);
            \Header('Content-type: application/octet-stream');
            \Header('Accept-Ranges: bytes');
            \Header('Content-Length: ' . $size);
            \Header("Content-Disposition: attachment; filename=" . \basename($path));
            \ob_clean();
            //向浏览器返回数据
            $downloadSize = 0;
            while (!feof($file)) {
                echo fread($file, 1024);
                $downloadSize += 1024;
            }
            \fclose($file);
            exit;
        } else {
            \error('文件不存在');
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
