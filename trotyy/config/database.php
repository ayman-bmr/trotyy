<?php
namespace TROTYY\config;

use PDO;
use PDOException;

class Database {
    private static $connection;
    private const HOST = "localhost:3308";
    private const DBNAME = "trottinettesdb";
    private const USERNAME = "root";
    private const PASSWORD = "";

    public static function getConnection(): PDO {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USERNAME,
                    self::PASSWORD
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}