<?php
namespace App\Services;

use \Namecho\Framework\Service;

class Demo extends Service
{
    public function test()
    {
        $this->load->model('Demo');
        return $this->Demo->test();
    }
}
