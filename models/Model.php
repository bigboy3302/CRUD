<?php
// Iekļauj datu bāzes klasi, lai mēs varētu izmantot tās funkcionalitāti
require "Database.php";

// Abstrakta klase, kuru izmantos visi modeļi
abstract class Model {

    // Statiskā aizsargātā īpašība, kas glabā datu bāzes instanci
    protected static $db;

    // Metode, kas inicializē datu bāzes savienojumu, izmantojot Singleton pattern
    public static function init() {
        // Ja datu bāze vēl nav inicializēta, izveido to
        if (!self::$db) {
            self::$db = new Database();
        }
    }

    // Abstrakta metode, kas jādefinē katram modelim, lai norādītu tabulas nosaukumu
    abstract protected static function getTableName(): string;

    // Publiskā statiskā metode, kas iegūst visus ierakstus no tabulas
    public static function all() {
        // Pārliecinās, ka datu bāze ir inicializēta
        self::init();

        // SQL vaicājums, lai iegūtu visus ierakstus no attiecīgās tabulas
        $sql = "SELECT * FROM " . static::getTableName();

        // Izpilda vaicājumu un iegūst visus ierakstus
        $records = self::$db->query($sql)->fetchAll();

        // Atgriež iegūtos ierakstus
        return $records;
    }
}
