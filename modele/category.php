<?php

namespace Mod;

require_once 'modele.php';

class Category extends Modele {

    // Renvoie la liste des items
    public function get_category(){
          
        $sql = 'SELECT * FROM categories';
        $data = $this->executerRequete($sql);
        $categories = array();
        foreach ($data as $element){
            $category = new \Ent\category($element);

            array_push($categories,$category);

        }

        return $categories;
        
    }
      
    // Renvoie les informations sur un item
    public function get_category_by_id($id_category){
          
        $sql = 'SELECT * FROM items WHERE id = ? ';
        $data = $this->executerRequete($sql, array($id_category));
        $categories = array();
        foreach ($data as $element){
            $category = new \Ent\category($element);

            array_push($categories,$category);

        }

        return $categories;  
    
    }

}