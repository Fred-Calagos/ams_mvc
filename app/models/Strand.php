<?php

namespace App\models;

use App\Core\Model;
use App\Core\Database;

class Strand extends Model
{
 protected static $table = "strands";

    public static function getByTrack($trackId)
        {
            $pdo = Database::connect();
            $stmt = $pdo->prepare("SELECT * FROM " . self::$table . " WHERE track_id = ?");
            $stmt->execute([$trackId]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
}
