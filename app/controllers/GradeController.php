<?php

namespace App\controllers;

use App\Core\Database;
use App\models\GradeLevel;
use App\Core\BaseController;
use App\models\AcadLevelCategory;

class GradeController extends BaseController
{
    // Display all grade levels
    public function index()
    {
        $grades = GradeLevel::all();
        $acadCategories = AcadLevelCategory::all(); // Fetch all academic categories
    
        $data = [
            'title' => 'Grade Levels',
            'grades' => $grades,
            'acadCategories' => $acadCategories, // Pass categories to view
            'content' => $this->renderView('/academic/grade/index', [
                'grades' => $grades,
                'acadCategories' => $acadCategories
            ])
        ];
    
        $this->view('layout/main', $data);
    }
    
    // Show the form to create a new grade
    public function create()
    {
        $data = [
            'title' => 'Add Grade Level',
            'content' => $this->renderView('/academic/grade/create')
        ];
        $this->view('layout/main', $data);
    }

    // Store new grade level in the database
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the database connection
            $pdo = Database::connect();

            // Create the new grade level using the database connection
            GradeLevel::create($_POST); // Assuming the create method in GradeLevel accepts the data

            // Get the latest grade level data using the last inserted ID
            $newGrade = GradeLevel::find($pdo->lastInsertId());

            // Return the new grade level data as JSON
            echo json_encode(["status" => "success", "newGrade" => $newGrade]);
            exit;
        }
    }


    // Show the form to edit an existing grade
    public function edit($id)
    {
        $grades = GradeLevel::find($id);
        if (!$grades) {
            $_SESSION['error'] = "Grade Level not found.";
            header("Location: /grades");
            exit;
        }

        $data = [
            'title' => 'Edit Grade Level',
            'grades' => $grades,
            'content' => $this->renderView('/academic/grade/edit', ['grade' => $grades])
        ];
        $this->view('layout/main', $data);
    }

    // Update the existing grade level
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $gradeLevel = $_POST['grade_level'];
            $gradeCategory = $_POST['acad_cat_id'];
    
            // Find the grade level record
            // Make sure all fields are valid
            if ($id && $gradeLevel && $gradeCategory) {
                // Update the academic year
                $data = [
                    'grade_level' => $gradeLevel,
                    'acad_cat_id' => $gradeCategory,
                ];
                GradeLevel::update($id, $data);
    
                // Return success response (or redirect)
                echo json_encode(['status' => 'success', 'message' => 'Grade Level updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        }
    }
    

    // Delete a grade level
    public function delete($id)
    {
        $grade = GradeLevel::find($id);
        if (!$grade) {
            $_SESSION['error'] = "Grade Level not found.";
            header("Location: /grades");
            exit;
        }

        if ($grade->delete()) {
            $_SESSION['success'] = "Grade Level deleted successfully!";
            header("Location: /grades");
            exit;
        } else {
            $_SESSION['error'] = "Failed to delete Grade Level.";
            header("Location: /grades");
            exit;
        }
    }
}
