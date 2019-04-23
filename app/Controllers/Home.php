<?php
namespace App\Controllers;

use \Namecho\Framework\Controller;

class Home extends Controller
{
    public function index($req, $res)
    {
        $this->load->service('demo');
        $data = $this->Demo->test();
        $res->view('HelloWord');
    }
}
