<?php

namespace App\controllers;

use App\Core\Database;
use App\models\Section;
use App\Core\BaseController;

class SectionController extends BaseController
{
    // Display all sections or sections for a specific grade
    public function index()
    {
        $gradeId = $_GET['grade_id'] ?? null;
        $sections = $gradeId ? Section::getByGrade($gradeId) : Section::all();

        $data = [
            'title' => 'Manage Sections',
            'sections' => $sections,
            'grade_id' => $gradeId,
            'content' => $this->renderView('/academic/section/index', [
                'sections' => $sections,
                'grade_id' => $gradeId
            ])
        ];

        $this->view('layout/main', $data);
    }

    // Show the form to create a new section
    public function create()
    {
        $gradeId = $_GET['grade_id'] ?? null;

        $data = [
            'title' => 'Add Section',
            'grade_id' => $gradeId,
            'content' => $this->renderView('/academic/section/create', ['grade_id' => $gradeId])
        ];
        
        $this->view('layout/main', $data);
    }

    // Store new section in the database
        public function store()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $pdo = Database::connect();
                $sectionName = $_POST['section_name'] ?? '';
                $gradeId = $_POST['grade_id'] ?? null;
        
                if ($sectionName && $gradeId) {
                    // Insert new section
                    Section::create([
                        'section_name' => $sectionName,
                        'grade_level_id' => $gradeId
                    ]);
        
                    // Redirect back to the section list with grade_id
                    header("Location: /section?grade_id=" . $gradeId);
                    exit;
                }
            }
        }
    

    // Show the edit form
    public function edit($id)
    {
        $section = Section::find($id);
        if (!$section) {
            $_SESSION['error'] = "Section not found.";
            header("Location: /sections");
            exit;
        }

        $data = [
            'title' => 'Edit Section',
            'section' => $section,
            'content' => $this->renderView('/academic/section/edit', ['section' => $section])
        ];
        
        $this->view('layout/main', $data);
    }

    // Update the existing section
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $sectionName = $_POST['section_name'] ?? '';
            $gradeId = $_POST['grade_level_id'] ?? null;

            if ($id && $sectionName && $gradeId) {
                Section::update($id, [
                    'section_name' => $sectionName,
                    'grade_level_id' => $gradeId
                ]);

                echo json_encode(['status' => 'success', 'message' => 'Section updated successfully.']);
                exit;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
                exit;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            exit;
        }
    }

    // Delete a section
    public function delete($id)
    {
        $section = Section::find($id);
        if (!$section) {
            $_SESSION['error'] = "Section not found.";
            header("Location: /sections");
            exit;
        }

        if ($section->delete()) {
            $_SESSION['success'] = "Section deleted successfully!";
            header("Location: /sections");
            exit;
        } else {
            $_SESSION['error'] = "Failed to delete section.";
            header("Location: /sections");
            exit;
        }
    }
}
