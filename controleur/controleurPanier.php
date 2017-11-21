<?php

namespace Con;

use Mod\item;
use Mod\category;
use Vue\vue;

class ControleurPanier {

	private $item;
    private $category;

	public function __construct() {

	      	$this->item = new Item();
            $this->category = new Category();

	}

	public function panier() {

		$vue = new Vue("Panier");
        $vue->generer(array(null));

	}

	public function creationPanier(){
   	
   		if (!isset($_SESSION['panier'])){
		    $_SESSION['panier'] = array();
		    $_SESSION['panier']['name'] = array();
		    $_SESSION['panier']['quantite'] = array();
		    $_SESSION['panier']['price'] = array();
		    $_SESSION['panier']['image'] = array();

   		}

   		return true;

	}

	public function ajouterArticle($name,$quantite,$price,$image){

		$positionProduit = array_search($name,  $_SESSION['panier']['name']);

	    if ($positionProduit !== false)
	    {
	        $_SESSION['panier']['quantite'][$positionProduit] += $quantite ;
	    }
	    else {

	    	array_push( $_SESSION['panier']['name'],$name);
	     	array_push( $_SESSION['panier']['quantite'],$quantite);
	     	array_push( $_SESSION['panier']['price'],$price);
	     	array_push( $_SESSION['panier']['image'],$image);

	    }
	      	
	}

	public function supprimerArticle($name){
	   //Si le panier existe
	      //Nous allons passer par un panier temporaire
		    $tmp=array();
		    $tmp['name'] = array();
		    $tmp['quantite'] = array();
		    $tmp['price'] = array();
		    $tmp['image'] = array();

	      	for($i = 0; $i < count($_SESSION['panier']['name']); $i++) {
	         
		        if ($_SESSION['panier']['name'][$i] !== $name) {

		            array_push( $tmp['name'],$_SESSION['panier']['name'][$i]);
		            array_push( $tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
		            array_push( $tmp['price'],$_SESSION['panier']['price'][$i]);
		            array_push( $tmp['image'],$_SESSION['panier']['image'][$i]);

	         	}

	      	}
		    //On remplace le panier en session par notre panier temporaire à jour
		    $_SESSION['panier'] =  $tmp;
		    //On efface notre panier temporaire
		    unset($tmp);

	   	

	}

	public function supprimerPanier(){
   
   		unset($_SESSION['panier']);
	}

	public function MontantGlobal(){
	   
	   $montant=0;
	   for($i = 0; $i < count($_SESSION['panier']['name']); $i++)
	   {
	      $montant += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['price'][$i];
	   }
	   return $montant;

	}

}
