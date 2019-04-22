<?php
namespace App\Models;

use \Namecho\Framework\Model;

class Demo extends Model
{
    public function test()
    {
        return [
            'username' => 'admin',
            'password' => 'admin',
        ];
    }
}
