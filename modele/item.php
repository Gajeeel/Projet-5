<?php

namespace Mod;

require_once 'modele.php';

class Item extends Modele {

    // Renvoie la liste des items
    public function get_items(){
          
        $sql = 'SELECT * FROM items ORDER BY category';
        $data = $this->executerRequete($sql);
        $items = array();
        foreach ($data as $element){
            $item = new \Ent\item($element);

            array_push($items,$item);

        }

        return $items;
        
    }

    // Renvoie les informations sur un item
    public function get_item_by_category($id_category){
          
        $sql = 'SELECT * FROM items WHERE category = ? ORDER BY price';
        $data = $this->executerRequete($sql, array($id_category));
        $items = array();
        foreach ($data as $element){
            $item = new \Ent\item($element);

            array_push($items,$item);

        }

        return $items;  
    
    }
      
    // Renvoie les informations sur un item
    public function get_item_by_id($id_item){
          
        $sql = 'SELECT * FROM items WHERE id = ? ';
        $data = $this->executerRequete($sql, array($id_item));
        $items = array();
        foreach ($data as $element){
            $item = new \Ent\Item($element);

            array_push($items,$item);

        }

        return $items;  
    
    }

    //Supprime un billet
    public function supp_item($id_item){
          
        $sql = 'DELETE FROM items WHERE id = ? ';
        $suppr = $this->executerRequete($sql, array($id_item));

    }

    // Insert un billet
    public function ins_item($name,$description,$price,$image,$category){
          
        $sql = "INSERT INTO items (name, description, price, image, category) VALUES ( ? , ? , ? , ? , ?)";
        $article = $this->executerRequete($sql, array($name,$description,$price,$image,$category));   
          
    }

    // modifie un billet
    public function update_item($name,$description,$price,$image,$category,$id_item){
          
        $sql = 'UPDATE items SET name = ? , description = ? , price = ?, image = ?, category = ? WHERE id = ? ';
        $update = $this->executerRequete($sql, array($name,$description,$price,$image,$category,$id_item));
          
    }

    public function update_item2($name,$description,$price,$category,$id_item){
          
        $sql = 'UPDATE items SET name = ? , description = ? , price = ?, category = ? WHERE id = ? ';
        $update = $this->executerRequete($sql, array($name,$description,$price,$category,$id_item));
          
    }

}