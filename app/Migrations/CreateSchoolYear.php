<?php

namespace Migrations;

use PDO;
class CreateSchoolYear
{
    public function up(PDO $pdo){
        $sql = "CREATE TABLE IF NOT EXISTS academic_years (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    start_year INT NOT NULL,
                    end_year INT NOT NULL,
                    status ENUM('Active', 'Inactive') NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
                ";
        $pdo->exec($sql);
    }

    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS academic_years");
    }
}
