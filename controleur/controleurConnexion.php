<?php

namespace Con;

use Vue\vue;

class ControleurConnexion {

  // Affiche la liste de tous les billets du blog
    public function connexion() {

        $vue = new Vue("Connexion");
        $vue->generer(array(null));

    }

    public function deconnexion(){

    	session_start();
    	unset($_SESSION['admin']);
    	header('Location: index.php');

    }
}