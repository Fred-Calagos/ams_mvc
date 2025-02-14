<?php

namespace App\controllers;

use App\Core\BaseController;

class SettingController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Settings',
            'content' => $this->renderView('settings/index')
        ];

        $this->view('layout/main', $data);
    }
}
