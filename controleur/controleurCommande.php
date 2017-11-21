<?php

namespace Con;

require 'vendor/autoload.php';
use Vue\vue;

class ControleurCommande {

  // Affiche la liste de tous les billets du blog
    public function Form() {

        $vue = new Vue("Form");
        $vue->generer(array(null));

    }
}