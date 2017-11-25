<?php

namespace Con;

require 'vendor/autoload.php';
use Vue\vue;

class ControleurCommande {

    public function commande() {

        $vue = new Vue("Fin");
        $vue->generer(array(null));

    }

    public function Form() {

        $vue = new Vue("Form");
        $vue->generer2(array(null));

    }

}