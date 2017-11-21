<?php

namespace Con;

use Mod\item;
use Vue\vue;

class ControleurCategory {

    private $category;

    public function __construct() {

        $this->item = new Item();
        
    }

  // Affiche la liste de tous les billets du blog
    public function category($id_category) {

        $items = $this->item->get_item_by_category($id_category);

        $vue = new Vue("Category");
        $vue->generer(array('items' => $items));

    }
}