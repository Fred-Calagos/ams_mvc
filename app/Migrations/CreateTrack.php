<?php

namespace Migrations;

use PDO;

class CreateTrack
{
    public function up(PDO $pdo){
        $sql = "CREATE TABLE IF NOT EXISTS tracks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                track_name VARCHAR(100) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );";
            $pdo->exec($sql);
    }
    
    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS tracks");
    }
}
