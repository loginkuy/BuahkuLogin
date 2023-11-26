<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

class AdminBeranda extends BaseController
{
    public function index()
    {
        echo view('admin_beranda');
    }
}
