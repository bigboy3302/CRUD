<?php

require "models/Model.php";

class Blog extends Model {

    // Atgriež visus ierakstus
    public static function all() {
        self::init();
        $sql = "SELECT * FROM " . static::getTableName();
        return self::$db->query($sql)->fetchAll();
    }

    // Atgriež ierakstu pēc ID
    public static function find($id) {
        self::init();
        $sql = "SELECT * FROM " . static::getTableName() . " WHERE id = :id";
        return self::$db->query($sql, ['id' => $id])->fetch();
    }

    // Izveido jaunu ierakstu
    public static function create($data) {
        self::init();
        $sql = "INSERT INTO " . static::getTableName() . " (content) VALUES (:content)";
        self::$db->query($sql, ['content' => $data['content']]);
    }

    // Saglabā ierakstu (atjaunot pēc ID)
    public function save() {
        self::init();
        $sql = "UPDATE " . static::getTableName() . " SET content = :content WHERE id = :id";
        self::$db->query($sql, ['content' => $this->content, 'id' => $this->id]);
    }

    // Dzēš ierakstu pēc ID
    public static function delete($id) {
        self::init();
        $sql = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        self::$db->query($sql, ['id' => $id]);
    }

    // Obligāts metods tabulas nosaukuma atgriešanai
    protected static function getTableName(): string {
        return "posts"; // Tabulas nosaukums datu bāzē
    }
}
