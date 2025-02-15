<?php

namespace App\controllers;

use App\models\Track;
use App\Core\Database;
use App\Core\BaseController;

class TrackController extends BaseController
{
    public function index()
    {
        $tracks = Track::all();
        $data = [
            'title' => 'Tracks',
            'tracks' => $tracks,
            'content' => $this->renderview('/academic/tracks/index', ['tracks' => $tracks])
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
            // Retrieve the database connection
            $pdo = Database::connect();

            // Create the new grade level using the database connection
            Track::create($_POST); // Assuming the create method in GradeLevel accepts the data

            // Get the latest grade level data using the last inserted ID
            $newTrack = Track::find($pdo->lastInsertId());

            // Return the new grade level data as JSON
            echo json_encode(["status" => "success", "newTrack" => $newTrack]);
            exit;
        }
    }

    public function edit($id)
    {
        // Code for showing form to edit a track
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $trackName = $_POST['track_name'];
    
            if ($id && $trackName) {
                // Update the track
                $data = ['track_name' => $trackName];
                Track::update($id, $data);
    
                echo json_encode(['status' => 'success', 'message' => 'Track updated successfully.']);
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
