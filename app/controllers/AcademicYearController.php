<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\BaseController;
use App\Models\AcademicYear;

class AcademicYearController extends BaseController {
    public function index() {
        $academicYears = AcademicYear::all();

        $data = [
            'title' => 'Academic Years',
            'academicYears' => $academicYears,
            'content' => $this->renderView('/academic/academic_years/index', ['academicYears' => $academicYears])
        ];

        $this->view('layout/main', $data);
    }

    public function create() {
        $data = [
            'title' => 'Add Academic Year',
            'content' => $this->renderView('/academic/academic_years/create')
        ];

        $this->view('layout/main', $data);
    }

        public function store() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the database connection
                $pdo = Database::connect();
    
                // Create the new academic year using the database connection
                AcademicYear::create($_POST); // Assuming the create method in AcademicYear accepts the PDO object
    
                // Get the latest academic year data using the last inserted ID
                $newYear = AcademicYear::find($pdo->lastInsertId());
    
                // Return the new academic year data as JSON
                echo json_encode(["status" => "success", "newYear" => $newYear]);
                exit;
            }
        }
    
    
    // Method to edit an academic year
    public function edit($id) {
        $academicYear = AcademicYear::find($id);

        $data = [
            'title' => 'Edit Academic Year',
            'academicYear' => $academicYear,
            'content' => $this->renderView('academic_years/edit', ['academicYear' => $academicYear])
        ];

        $this->view('layout/main', $data);
    }

    // Method to update an academic year
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and get the POST data
            $id = $_POST['id'];
            $startYear = $_POST['start_year'];
            $endYear = $_POST['end_year'];
            $status = $_POST['status'];
    
            // Make sure all fields are valid
            if ($id && $startYear && $endYear && $status) {
                // Update the academic year
                $data = [
                    'start_year' => $startYear,
                    'end_year' => $endYear,
                    'status' => $status
                ];
                AcademicYear::update($id, $data);
    
                // Return success response (or redirect)
                echo json_encode(['status' => 'success', 'message' => 'Academic Year updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        }
    }
    

    // Method to delete an academic year
    public function delete($id) {
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Invalid ID."]);
            exit;
        }
    
        // Debugging: Log the ID before deletion
        error_log("Attempting to delete Academic Year with ID: " . $id);
    
        $deleted = AcademicYear::delete($id);
    
        if ($deleted) {
            echo json_encode(["status" => "success", "message" => "Academic Year deleted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete record."]);
        }
        exit;
    }
    
    
}
