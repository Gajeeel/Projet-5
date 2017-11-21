<?php

namespace Con;

use Mod\item;
use Mod\category;
use Vue\vue;

class ControleurAdmin {

	private $item;
    private $category;

	public function __construct() {

	      	$this->item = new Item();
            $this->category = new Category();

	}

	public function admin() {

        $items = $this->item->get_items();
        $vue = new Vue("Admin");
        $vue->generer2(array('items' => $items));

    }

    public function gotoajouter() {

        $categories = $this->category->get_category();
    	$vue = new Vue("Ajouter");
        $vue->generer2(array('categories' => $categories));

    }

    public function ajouter($name,$description,$price,$image,$category) {

        $this->item->ins_item($name,$description,$price,$image,$category);

    }

    public function gotomodifier($id_item) {

        $categories = $this->category->get_category();
        $items = $this->item->get_item_by_id($id_item);
    	$vue = new Vue("Modifier");
        $vue->generer2(array('items' => $items, 'categories' => $categories));

    }

    public function modifier($name,$description,$price,$image,$category,$id_item) {

        $this->item->update_item($name,$description,$price,$image,$category,$id_item);

    }

    public function modifier2($name,$description,$price,$category,$id_item) {

        $this->item->update_item2($name,$description,$price,$category,$id_item);

    }

    public function gotoview($id_item) {

        $items = $this->item->get_item_by_id($id_item);
    	$vue = new Vue("Item");
        $vue->generer2(array('items' => $items));

    }

    public function gotodelete($id_item) {

        $items = $this->item->get_item_by_id($id_item);
    	$vue = new Vue("Supprimer");
        $vue->generer(array('items' => $items));

    }

    public function delete($id_item) {

        $this->item->supp_item($id_item);

    }
}