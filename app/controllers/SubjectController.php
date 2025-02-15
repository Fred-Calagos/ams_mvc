<?php

namespace App\controllers;

use App\models\Subject;
use App\Core\BaseController;

class SubjectController extends BaseController
{
    public function index(){
        $subjects = Subject::all();

        $data = [
            'title' => 'Manage Subjects',
            'subjects' => $subjects,
            'content' => $this->renderView('/academic/subjects/index', ['subjects' => $subjects])
        ];

        $this->view('layout/main', $data);
    }
}
