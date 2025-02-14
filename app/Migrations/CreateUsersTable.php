<?php

namespace Migrations;

use PDO;

class CreateUsersTable {
    public function up(PDO $pdo) {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $pdo->exec($sql);
    }

    public function down(PDO $pdo) {
        $pdo->exec("DROP TABLE IF EXISTS users");
    }
}
