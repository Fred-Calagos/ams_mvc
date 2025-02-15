<?php

namespace Migrations;

use PDO;

class CreateSubjectCategory
{
    public function up(PDO $pdo){
        $sql = "CREATE TABLE IF NOT EXISTS subject_category (
                id INT AUTO_INCREMENT PRIMARY KEY,
                subcat VARCHAR(100) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );";
            $pdo->exec($sql);
    }
    
    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS subject_category");
    }
}
