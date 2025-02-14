<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Database;

class Section extends Model
{
    protected static $table = 'section';
        // Fetch sections by grade level ID
        public static function getByGrade($gradeId)
        {
            $pdo = Database::connect();
            $stmt = $pdo->prepare("SELECT * FROM " . self::$table . " WHERE grade_level_id = ?");
            $stmt->execute([$gradeId]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    
}   


