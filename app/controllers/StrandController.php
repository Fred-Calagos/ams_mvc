<?php

namespace App\controllers;

use App\models\Track;
use App\Core\Database;
use App\models\Strand;
use App\Core\BaseController;

class StrandController extends BaseController
{
    public function index()
    {
        $trackId = $_GET['track_id'] ?? null;
        $strands = $trackId ? Strand::getByTrack($trackId) : Strand::all();

        // Fetch the grade name if a grade_id is present
        $TrackName = $trackId ? Track::find($trackId)['track_name'] ?? 'Unknown Track' : null;

        $data = [
            'title' => 'Manage Strands',
            'strands' => $strands,
            'track_id' => $trackId,
            'track_name' => $TrackName, // Pass grade name to view
            'content' => $this->renderView('/academic/strand/index', [
                'strands' => $strands,
                'trackId' => $trackId,
                'trackName' => $TrackName
            ])
        ];

        $this->view('layout/main', $data);
    }

    public function create()
    {
        // Code for showing form to create a new track
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pdo = Database::connect();
            $strandName = $_POST['strand_name'] ?? '';
            $trackId = $_POST['track_id'] ?? null;
    
            if ($strandName && $trackId) {
                // Insert new section
                Strand::create([
                    'strand_name' => $strandName,
                    'track_id' => $trackId
                ]);
    
                // Redirect back to the section list with grade_id
                header("Location: /strand?track_id=" . $trackId);
                exit;
            }
        }
    }

    public function edit($id)
    {
        // Code for showing form to edit a track
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $strandName = $_POST['strand_name'] ?? '';
            $trackId = $_POST['track_id']?? null;
    
            if ($id && $strandName && $trackId) {
                // Update the Strand
                $data = [
                    'strand_name' => $strandName,
                    'track_id'=> $trackId,
                ];
                Strand::update($id, $data);
    
                echo json_encode(['status' => 'success', 'message' => 'Strand updated successfully.']);
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
    

    public function destroy($id)
    {
        // Code for deleting a track
    }
}
