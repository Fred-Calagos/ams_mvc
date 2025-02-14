<?php

namespace Migrations;

use PDO;
class CreateAcadLevelCat
{
    public function up(PDO $pdo)
    {
        $sql = "CREATE TABLE IF NOT EXISTS acad_level_category (
                id INT AUTO_INCREMENT PRIMARY KEY,
                acad_cat VARCHAR(10) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );";

        $pdo->exec($sql);
    }
    public function down(PDO $pdo){
        $pdo->exec("DROP TABLE IF EXISTS grade");
    }
}
