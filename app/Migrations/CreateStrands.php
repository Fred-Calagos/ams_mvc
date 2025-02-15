<?php

namespace Migrations;

use PDO;

class CreateStrands
{
    public function up(PDO $pdo){
        $sql = "CREATE TABLE IF NOT EXISTS strands (
                id INT AUTO_INCREMENT PRIMARY KEY,
                strand_name VARCHAR(100) NOT NULL,
                track_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (track_id) REFERENCES tracks(id)
            );";
            $pdo->exec($sql);
    }
    
    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS strands");
    }
}
