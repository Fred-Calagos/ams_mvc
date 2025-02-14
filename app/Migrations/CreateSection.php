<?php

namespace Migrations;

use PDO;

class CreateSection
{
    
    public function up(PDO $pdo)
    {
        $sql = "CREATE TABLE IF NOT EXISTS section (
                id INT AUTO_INCREMENT PRIMARY KEY,
                section_name VARCHAR(50) NOT NULL,
                grade_level_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );";

        $pdo->exec($sql);
    }
    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS section");
    }
}
