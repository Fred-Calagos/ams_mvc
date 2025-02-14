<?php

namespace App\Controllers;

use App\Models\Student;
use App\Core\BaseController;

class StudentController extends BaseController  {
    public function index() {
        $students = Student::all();

        $data = [
            'title' => 'Students',
            'students' => $students,
            'content' => $this->renderView('students/index', ['students' => $students])
        ];

        $this->view('layout/main', $data);
    }

    public function create() {
        $data = [
            'title' => 'Add Student',
            'content' => $this->renderView('students/create')
        ];

        $this->view('layout/main', $data);
    }

    public function store() {
        Student::create($_POST);
        header("Location: /students");
        exit;
    }

    public function edit() {


        $id = $_GET['id'] ?? null;
        $student = Student::find($id);

        $data = [
            'title' => 'Edit Student',
            'student' => $student,
            'content' => $this->renderView('students/edit', ['student' => $student])
        ];

        $this->view('layout/main', $data);
    }

    public function update() {


        $id = $_POST['id'];
        Student::update($id, $_POST);
        header("Location: /students");
        exit;
    }

    public function delete() {


        $id = $_GET['id'] ?? null;
        Student::delete($id);
        header("Location: /students");
        exit;
    }


}
