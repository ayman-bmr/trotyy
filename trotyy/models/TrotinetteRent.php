<?php
class TrotinetteRent {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRentalScooters() {
        $query = "SELECT t.id_trotinette, t.numserie, t.tarif, 
                         m.nom as modele_nom, m.vitesse_max, m.autonomie, m.poids, m.charge, m.portee_max
                  FROM trotinette t
                  JOIN modele m ON t.id_modele = m.id_modele
                  WHERE t.typecommercialisation = 2";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>