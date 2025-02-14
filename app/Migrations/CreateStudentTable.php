<?php

namespace Migrations;
use PDO;
class CreateStudentTable
{
    public function up(PDO $pdo)
    {
        $sql = "CREATE TABLE IF NOT EXISTS students (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    lrn VARCHAR(12) UNIQUE NOT NULL, -- Learner Reference Number
                    first_name VARCHAR(50) NOT NULL,
                    middle_name VARCHAR(50) NULL,
                    last_name VARCHAR(50) NOT NULL,
                    suffix VARCHAR(10) NULL, -- Suffix (e.g., Jr., III)
                    gender ENUM('Male', 'Female') NOT NULL,
                    birth_date DATE NOT NULL,
                    religion VARCHAR(50) NULL,
                    
                    house_number VARCHAR(100) NULL,
                    street_purok VARCHAR(100) NULL,
                    barangay VARCHAR(50) NOT NULL,
                    city_municipality VARCHAR(50) NOT NULL,
                    province VARCHAR(50) NOT NULL,

                    father_name VARCHAR(100) NULL,
                    mother_name VARCHAR(100) NULL,
                    guardian_name VARCHAR(100) NULL,
                    guardian_relationship VARCHAR(50) NULL,
                    
                    learning_modality ENUM('Online', 'Modular', 'Face-to-Face', 'Blended') NOT NULL,
                    remarks TEXT NULL,
                    parent_guardian_contact VARCHAR(15) NULL, -- Store in international format if needed\

                    grade VARCHAR(10) NULL,
                    section VARCHAR(10) NULL,
                    profile VARCHAR(255) NULL,
                    rfid VARCHAR(20) NULL,

                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                );
            ";  
        $pdo->exec($sql);
    }

    public function down(PDO $pdo)
    {
        $pdo->exec("DROP TABLE IF EXISTS students");
    }

}
