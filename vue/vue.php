<?php

namespace Vue;

require'vendor/autoload.php';

use Mod\item;
use Mod\category;
use Mod\modele;
use PDO;

class Vue {

    // Nom du fichier associé à la vue
    private $fichier;
    // Titre de la vue (défini dans le fichier vue)
    private $titre;

    public function __construct($action) {

      // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "vue/vue" . $action . ".php";

    }

    // Génère et affiche la vue
    public function generer($donnees) {

        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('vue/template.php',
          array('contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;

    }

    public function generer2($donnees) {

        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('vue/template2.php',
          array('contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;

    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees) {

        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();

        } else {

            throw new \Exception("Fichier '$fichier' introuvable");

        }
        
    }
}