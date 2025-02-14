<?php

namespace App\Models;

use PDO;
use App\Core\Model;
use App\Core\Database;

class GradeLevel extends Model {
    protected static $table = 'grade';

    // Override the all() method to join acad_level_category
    public static function all() {
        $stmt = Database::connect()->query("
            SELECT g.*, a.acad_cat 
            FROM grade g
            JOIN acad_level_category a ON g.acad_cat_id = a.id
            ORDER BY g.grade_level ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

