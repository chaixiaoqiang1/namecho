<?php
namespace App\Controllers;

use \Namecho\Framework\Controller;

class No extends Controller
{
    public function index($req, $res)
    {
        $res->view('404');
    }
}
