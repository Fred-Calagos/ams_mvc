<?php

namespace App\Controllers;

use App\Core\BaseController;

class DashboardController extends BaseController {
    public function index() {
        $data = [
            'title' => 'Dashboard',
            'content' => $this->renderView('dashboard/index')
        ];

        $this->view('layout/main', $data);
    }
}
