<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tips_model;

class Tips extends BaseController
{
    public function detail($id)
    {
        $modeltips = new Tips_model;
        $data['tips'] = $modeltips->getTipsId($id);

        return view('detail-tips', $data);
    }
}