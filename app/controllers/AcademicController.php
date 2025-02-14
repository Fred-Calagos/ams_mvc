<?php 

namespace App\Controllers;

use App\Core\BaseController;

class AcademicController extends BaseController {
    public function index() {
        $data = [
            'title' => 'Academic',
            'content' => $this->renderView('academic/index')
        ];

        $this->view('layout/main', $data);
    }

}