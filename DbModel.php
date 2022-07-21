<?php 

namespace App\core;

use PDO;

/**
 * 
 * @package App\core
 */

abstract class DbModel extends Model
{
    public static string $tableName;
    
    abstract public function attributes(): array;
    
    public static string $primaryKey;

    public function save()
    {
        $tableName = static::$tableName;

        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (". implode(',', $attributes) .") VALUES (". implode(',', $params) .");");
        
        // echo '<pre>';
        // var_dump($attributes);
        // echo '</pre>';
        // exit;

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }

        $statement->execute();

        return true;

    }

    public static function findOne($where)
    {
        $tableName = static::$tableName;

        $attributes = array_keys($where);

        $sql = implode("AND ",array_map(fn($attr) => "$attr = :$attr", $attributes));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
