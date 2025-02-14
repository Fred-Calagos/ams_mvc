<?php

namespace App\Models;

use PDO;

class User {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=ams_mvc_db", "root", "root");
    }
    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
