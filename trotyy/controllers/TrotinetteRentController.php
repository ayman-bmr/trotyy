<?php
require_once 'models/TrotinetteRent.php';

class TrotinetteRentController {
    private $trotinetteRent;

    public function __construct($db) {
        $this->trotinetteRent = new TrotinetteRent($db);
    }

    public function index() {
        $scooters = $this->trotinetteRent->getRentalScooters();
        require 'views/location.php';
    }
}
?>