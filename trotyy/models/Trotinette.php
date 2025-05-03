<?php
namespace TROTYY\Models;

// Use absolute path
require_once __DIR__ . '/../config/Database.php';

use PDO;
use PDOException;
use TROTYY\config\Database;

class Trotinette {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function lister(?int $type = null): array {
        $query = "SELECT t.*, m.Libelle, m.Puissance, m.Autonomie 
                FROM Trotinette t
                JOIN Modele m ON t.IDModele = m.IDModele";
        
        if ($type !== null) {
            $query .= " WHERE t.TypeCommercialisation = :type";
        }
        
        $stmt = $this->db->prepare($query);
        
        try {
            if ($type !== null) {
                $stmt->execute([':type' => $type]);
            } else {
                $stmt->execute();
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur de récupération: " . $e->getMessage());
            return [];
        }
    }
}