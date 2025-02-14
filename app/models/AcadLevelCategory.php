<?php

namespace App\Models;

use PDO;
use App\Core\Model;
use App\Core\Database;

class AcadLevelCategory extends Model
{
    protected static $table = 'acad_level_category';

    // Fetch all academic categories
    public static function all()
    {
        $stmt = Database::connect()->query("SELECT * FROM acad_level_category ORDER BY acad_cat ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

