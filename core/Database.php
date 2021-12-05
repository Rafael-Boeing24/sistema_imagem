<?php
namespace core;

use \src\Config;

class Database {

    private static $_pdo;

    /**
     * Carrega o Modelo de PDO
     * @return \PDO
     */
    public static function getInstance() {
        if(!isset(self::$_pdo)) {
            self::$_pdo = new \PDO(Config::DB_DRIVER.":dbname=".Config::DB_DATABASE.";host=".Config::DB_HOST, Config::DB_USER, Config::DB_PASS);
        }
        return self::$_pdo;
    }

    private function __construct() { }
    private function __clone() { }
    public function __wakeup() { }
}