<?php
// Iekļauj modeli, kas satur vispārējos datu bāzes vaicājumus
require_once 'Model.php';

class Post extends Model {

    // Definē konkrētās tabulas nosaukumu, kuru šis modelis izmantos
    protected static function getTableName(): string {
        return 'posts';  // Atgriež tabulas nosaukumu "posts"
    }
}
