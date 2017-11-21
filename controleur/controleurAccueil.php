<?php

namespace Con;

require 'vendor/autoload.php';
use Vue\vue;

class ControleurAccueil {

  // Affiche la liste de tous les billets du blog
    public function accueil() {

        $vue = new Vue("Accueil");
        $vue->generer(array(null));

    }
}