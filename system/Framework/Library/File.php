<?php
namespace Namecho\Framework\Library;

class File
{
    private static $instance = null;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (!(self::$instance instanceof File)) {
            self::$instance = new File();
        }
        return self::$instance;
    }

    public function pushContent($path, $data)
    {
        // if (\file_exists($path)) {
        \file_put_contents($path, $data, FILE_APPEND);
        // } else {
        //     $file = \fopen($path, 'a');
        //     \fwrite($file, $data);
        //     \fclose($file);
        // }
    }

    public function pushJson($path, $data)
    {
        if (\file_exists($path)) {
            $jsonArray = \json_decode(\file_get_contents($path), true);
            \array_push($jsonArray, $data);
            \file_put_contents($path, \json_encode($jsonArray));
        } else {
            $file = \fopen($path, 'a+');
            $json = [];
            \array_push($json, $data);
            \fwrite($file, \json_encode($json));
            \fclose($file);
        }
    }
}
