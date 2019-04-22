<?php
namespace App\Controllers;

use \Namecho\Framework\Controller;

class Home extends Controller
{
    public function index($req, $res)
    {
        $this->load->service('demo');
        $data = $this->Demo->test();
        $res->json($data);
        // $res->view('HelloWord');

        $res->download($req->path . 'index.php');
    }
}
