<?php

namespace App\Controllers;

use App\Core\BaseController;

class UserController extends BaseController {
    public function index() {
        $data = [
            'title' => 'User Account',
            'content' => $this->renderView('users/index')
        ];

        $this->view('layout/main', $data);
    }
}
