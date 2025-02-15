<?php

namespace Migrations;

use PDO;

class CreateSubjects
{
    public function up(PDO $pdo){
        $sql = "CREATE TABLE IF NOT EXISTS subjects (
                id INT AUTO_INCREMENT PRIMARY KEY,
                subject_name VARCHAR(100) NOT NULL,
                subcat_id INT NOT NULL, 
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (subcat_id) REFERENCES subject_category(id)
            );";
            $pdo->exec($sql);
    }
    
    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS subjects");
    }
}
?>
