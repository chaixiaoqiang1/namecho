<?php
namespace Namecho\Helper;

class Upload
{
    public $uploadUri = '';

    public function uploadFile($file, $path = null)
    {
        if (!isset($_FILES[$file]) or $_FILES[$file]['error'] > 0) {
            return 1;
        }
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if (!\in_array($extension, \config('app')['upload_type'], true)) {
            return 2;
        }
        if ($_FILES[$file]['size'] >= \config('app')['upload_size']) {
            return 3;
        }
        $upload_path = !empty($path) ? $path : \config('app')['default_upload_path'];
        $upload_dir = BASE_PATH . 'public/' . $upload_path;
        if (!\file_exists($upload_dir)) {
            \mkdir($upload_dir);
        }
        $upload_file_name = \uniqid() . '.' . $extension;
        $upload_url = $upload_dir . $upload_file_name;
        if (!file_exists($upload_url)) {
            \move_uploaded_file($_FILES[$file]["tmp_name"], $upload_url);
            $this->uploadUri = $upload_path . $upload_file_name;
            return 0;
        } else {
            return 4;
        }
    }

    public function __get($name)
    {
        if ($name === 'uploadUri') {
            \error('您未上传文件');
        } else {
            \error($name . ' 属性不存在');
        }
    }

    public function __call($name, $arguments)
    {
        \error($name . ' 函数不存在');
    }
}
