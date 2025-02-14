<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\BaseController;
use App\models\AcadLevelCategory;

class AcademicCategoryController extends BaseController
{
    public function index()
    {
        $academicCategrories = AcadLevelCategory::all();
        $data = [
            'title' => 'Academic Category',
            'academicCategrories' => $academicCategrories,
            'content' => $this->renderView('/settings/academic_category', ['academicCategrories' => $academicCategrories])
        ];

        $this->view('layout/main', $data);
    }
    public function create() {
        $data = [
            'title' => 'Create Academic Category',
            'content' => $this->renderView('settings/academic_category/create')
        ];

        $this->view('layout/main', $data);
    }
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the database connection
            $pdo = Database::connect();

            // Create the new academic year using the database connection
            AcadLevelCategory::create($_POST); // Assuming the create method in AcademicYear accepts the PDO object

            // Get the latest academic year data using the last inserted ID
            $newCategory = AcadLevelCategory::find($pdo->lastInsertId());

            // Return the new academic year data as JSON
            echo json_encode(["status" => "success", "newCategory" => $newCategory]);
            exit;
        }
    }
    
    public function edit($id) {
        $academicCategory = AcadLevelCategory::find($id);

        $data = [
            'title' => 'Edit Academic Category',
            'academicCategory' => $academicCategory,
            'content' => $this->renderView('academic_category/edit', ['academicCategory' => $academicCategory])
        ];

        $this->view('layout/main', $data);
    }
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and get the POST data
            $id = $_POST['id'];
            $acadCat = $_POST['acad_cat'];
    
            // Make sure all fields are valid
            if ($id && $acadCat) {
                // Update the academic year
                $data = [
                    'acad_cat' => $acadCat,
                ];
                AcadLevelCategory::update($id, $data);
    
                // Return success response (or redirect)
                echo json_encode(['status' => 'success', 'message' => 'Academic Category updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        }
    }
    
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Retrieve the database connection
            $pdo = Database::connect();

            // Delete the academic year using the database connection
            AcadLevelCategory::delete($id); // Assuming the delete method in AcademicYear accepts the PDO object

            // Return the status as JSON
            echo json_encode(["status" => "success"]);
            exit;
        }
    }
}