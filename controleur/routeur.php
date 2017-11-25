<?php

require 'vendor/autoload.php';

use Con\controleurAccueil;
use Con\controleurAdmin;
use Con\controleurCategory;
use Con\controleurConnexion;
use Con\controleurPanier;
use Con\controleurCommande;
use Mod\item;
use Mod\category;
use Mod\modele;
use Vue\vue;

class Routeur {

    private $ctrlAccueil;
    private $ctrlConnexion;
    private $ctrlAdmin;
    private $ctrlCategory;
    private $ctrlPanier;
    private $ctrlCommande;

    public function __construct() {
        $this->ctrlAccueil = new controleurAccueil();
        $this->ctrlCategory = new controleurCategory();
        $this->ctrlConnexion = new controleurConnexion();
        $this->ctrlAdmin = new controleurAdmin();
        $this->ctrlPanier = new controleurPanier();
        $this->ctrlCommande = new controleurCommande();
    }

    // Traite une requête entrante
    public function routerRequete() {
        
        try {
            session_start();
            if (isset($_GET['action'])) {

                if ($_GET['action'] == 'category') {

                     if(isset($_GET['id']) AND !empty($_GET['id'])) { 

                        $id_category = intval($this->getParametre($_GET,'id'));

                        if ($id_category <= 6 ) {

                            $this->ctrlCategory->category($id_category);

                        } else {

                            throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                        }

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }

                }

                else if ($_GET['action'] == 'gotoconnexion') {

                    $this->ctrlConnexion->connexion();

                }

                else if ($_GET['action'] == 'connexion') {

                    if(isset($_POST['pseudo']) && isset($_POST['mdp']))
                    {

                        $pseudo = $this->getParametre($_POST, 'pseudo');
                        $mdp = $this->getParametre($_POST, 'mdp');

                        if(($pseudo != '') && ($mdp != '')) {
                            if ('admin' == $pseudo && '1234' == $mdp)
                            {
                                $_SESSION['admin'] = true;
                                $reponse = 'ok';
                            }
                            else
                            {

                                $reponse = 'Utilisateur ou mot de passe incorrect !'; 

                            }
                        }
                        else
                        {
                            $reponse = 'Veuillez remplir tout les champs';

                        }
                    }
                    else
                    {
                      $reponse = 'Des valeurs ne sont pas envoyées';
                    }
                    echo json_encode(['reponse' => $reponse]);

                }

                else if (($_GET['action'] == 'admin') and (isset($_SESSION['admin']))) {

                    $this->ctrlAdmin->admin();
                    
                }

                else if (($_GET['action'] == 'gotoajouter') and (isset($_SESSION['admin']))) {

                    $this->ctrlAdmin->gotoajouter();
                    
                }

                else if (($_GET['action'] == 'ajouter') and (isset($_SESSION['admin']))) {

                    if( isset($_FILES['image']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category']) && !empty($_FILES['image']) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['category']) ) {

                        $name = $this->getParametre($_POST, 'name');
                        $description = $this->getParametre($_POST, 'description');
                        $price = $this->getParametre($_POST, 'price');
                        $category = $this->getParametre($_POST, 'category');
                        $image = ($_FILES['image']['name']);
                        $imagePath = 'vue/images/';
                        $fichier = basename($_FILES['image']['name']);
                        $controle_extensions_autorisees = ['JPG', 'jpg' , 'JPEG', 'jpeg', 'PNG', 'png', 'GIF', 'gif'];
                        $fichier_extension =  pathinfo($image, PATHINFO_EXTENSION);

                        if(in_array($fichier_extension, $controle_extensions_autorisees)) {

                                if($_FILES["image"]["size"] < 1000000) {

                                    if(move_uploaded_file($_FILES['image']['tmp_name'], $imagePath . $fichier)) {

                                        $this->ctrlAdmin->ajouter($name,$description,$price,$image,$category);
                                        header('Location: index.php?action=admin');

                                    } else {

                                        throw new Exception ('<div style="text-align:center"><h4>Il y a eu une erreur lors de l\'upload</h4> <br><br> <a type="button" href="index.php?action=gotoajouter" class="btn btn-primary btn-lg" >Retourner à l\'ajout d\'un article</a></div>');
                                    }

                                } else {

                                    throw new Exception ('<div style="text-align:center"><h4>Le fichier ne doit pas dépasser 1MO</h4> <br><br> <a type="button" href="index.php?action=gotoajouter" class="btn btn-primary btn-lg" >Retourner à l\'ajout d\'un article</a></div>');

                                }

                        } else {

                            throw new Exception ('<div style="text-align:center"><h4>Les extensions autorisés sont: .jpg, .jpeg .png .gif</h4> <br><br> <a type="button" href="index.php?action=gotoajouter" class="btn btn-primary btn-lg" >Retourner à l\'ajout d\'un article</a></div>');

                        }

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Veuillez remplir tout les champs avant d\'ajouter votre produit</h4> <br><br> <a type="button" href="index.php?action=gotoajouter" class="btn btn-primary btn-lg" >Retourner à l\'ajout d\'un article</a></div>');
                    }

                }


                else if (($_GET['action'] == 'gotomodifier') and (isset($_SESSION['admin']))) {

                    if(isset($_GET['id']) AND !empty($_GET['id'])) {

                    $id_item = intval($this->getParametre($_GET,'id'));
                    $this->ctrlAdmin->gotomodifier($id_item);

                    }
                    
                }

                else if (($_GET['action'] == 'modifier') and (isset($_SESSION['admin']))) {

                    if( isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category']) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['category']) ) {

                        $id_item = intval($this->getParametre($_GET,'id'));
                        $name = $this->getParametre($_POST, 'name');
                        $description = $this->getParametre($_POST, 'description');
                        $price = $this->getParametre($_POST, 'price');
                        $category = $this->getParametre($_POST, 'category');

                        if (!empty($_FILES['image']['name'])) {

                            $image = ($_FILES['image']['name']);
                            $imagePath = 'vue/images/';
                            $fichier = basename($_FILES['image']['name']);
                            $controle_extensions_autorisees = ['JPG', 'jpg' , 'JPEG', 'jpeg', 'PNG', 'png', 'GIF', 'gif'];
                            $fichier_extension =  pathinfo($image, PATHINFO_EXTENSION);

                            if(in_array($fichier_extension, $controle_extensions_autorisees)) {

                                if($_FILES["image"]["size"] < 1000000) {

                                    if(move_uploaded_file($_FILES['image']['tmp_name'], $imagePath . $fichier)) {

                                        $this->ctrlAdmin->modifier($name,$description,$price,$image,$category,$id_item);
                                        header('Location: index.php?action=admin');

                                    } else {

                                        throw new Exception ('<div style="text-align:center"><h4>Il y a eu une erreur lors de l\'upload</h4> <br><br> <a type="button" href="index.php?action=gotoajouter" class="btn btn-primary btn-lg" >Retourner à l\'ajout d\'un article</a></div>');

                                    }

                                } else {

                                    throw new Exception ('<div style="text-align:center"><h4>Le fichier ne doit pas dépasser les 1MO</h4> <br><br> <a type="button" href="index.php?action=admin" class="btn btn-primary btn-lg" >Retourner à l\'admin</a></div>');

                                }

                            } else {

                                throw new Exception ('<div style="text-align:center"><h4>Les extensions autorisés sont: .jpg, .jpeg .png .gif</h4> <br><br> <a type="button" href="index.php?action=admin" class="btn btn-primary btn-lg" >Retourner à l\'admin</a></div>');

                            }

                        } else {

                            $this->ctrlAdmin->modifier2($name,$description,$price,$category,$id_item);
                            header('Location: index.php?action=admin');

                        }

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Veuillez remplir tout les champs avant d\'ajouter votre produit</h4> <br><br> <a type="button" href="index.php?action=admin" class="btn btn-primary btn-lg" >Retourner à l\'admin</a></div>');
                    }

                    
                }

                else if (($_GET['action'] == 'gotoview') and (isset($_SESSION['admin']))) {

                    if(isset($_GET['id']) AND !empty($_GET['id'])) { 

                        $id_item = intval($this->getParametre($_GET,'id'));
                        $this->ctrlAdmin->gotoview($id_item);

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }
                    
                }

                else if (($_GET['action'] == 'gotodelete') and (isset($_SESSION['admin']))) {

                    $id_item = intval($this->getParametre($_GET,'id'));
                    $this->ctrlAdmin->gotodelete($id_item);
                    
                }

                else if (($_GET['action'] == 'delete') and (isset($_SESSION['admin']))) {

                    if(isset($_GET['id']) AND !empty($_GET['id'])) { 

                        $id_item = intval($this->getParametre($_GET,'id'));
                        $this->ctrlAdmin->delete($id_item);
                        header('Location: index.php?action=admin');

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }
                    
                }

                else if ($_GET['action'] == 'deconnexion') {

                    $this->ctrlConnexion->deconnexion();
                    $this->ctrlAccueil->accueil();

                }

                else if ($_GET['action'] == 'gotopanier') {

                    $this->ctrlPanier->panier();

                }

                else if ($_GET['action'] == 'addpanier') {

                    if( isset($_POST['name']) && isset($_POST['quantite']) && isset($_POST['price']) && isset($_POST['image']) && !empty($_POST['name']) && !empty($_POST['quantite']) && !empty($_POST['price']) && !empty($_POST['image'])  ) {

                        $name = $this->getParametre($_POST,'name');
                        $quantite = $this->getParametre($_POST,'quantite');
                        $price = $this->getParametre($_POST,'price');
                        $image = $this->getParametre($_POST,'image');

                        echo json_decode($name);
                        echo json_decode($quantite);
                        echo json_decode($price);
                        echo json_decode($image);

                        if (isset($_SESSION['panier'])) {

                            $this->ctrlPanier->ajouterArticle($name,$quantite,$price,$image);
                            
                            
                        } else {

                            $this->ctrlPanier->creationPanier();
                            $this->ctrlPanier->ajouterArticle($name,$quantite,$price,$image);
                            

                        }

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }

                }

                else if ($_GET['action'] == 'deleteofpanier') {

                    if(isset($_GET['name']) AND !empty($_GET['name'])) { 

                        $name = $this->getParametre($_GET,'name');
                        $this->ctrlPanier->supprimerArticle($name);

                        if (!empty($_SESSION['panier']['name'])) {

                            header('Location: index.php?action=gotopanier');

                        } else {

                            $this->ctrlPanier->supprimerPanier();
                            header('Location: index.php?action=gotopanier');

                        }

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }

                }

                else if ($_GET['action'] == 'gotoform') {

                    if( isset($_SESSION['panier']) && !empty($_SESSION['panier']) )
                    {

                        $rep = 'ok';
                        
                    } else {

                        $rep = 'Ajoutez des produits au panier avant de continuer';

                    }

                    echo json_encode(['rep' => $rep]);

                }

                else if ($_GET['action'] == 'form')  {

                    if (isset($_SESSION['panier']) && (!empty($_SESSION['panier'])) ) {

                    $this->ctrlCommande->form();

                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Veuillez ajouter des produits à votre panier avant d\'accedr à cette page</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }

                }

                

                else if ($_GET['action'] == 'fin') {

                    if ((isset($_SESSION['panier']) && (!empty($_SESSION['panier']))) && (isset($_POST['name']) && (!empty($_POST['name']))) && (isset($_POST['firstname']) && (!empty($_POST['firstname']))) && (isset($_POST['ville']) && (!empty($_POST['ville']))) && (isset($_POST['adress']) && (!empty($_POST['adress']))) && (isset($_POST['code']) && (!empty($_POST['code']))) && (isset($_POST['email']) && (!empty($_POST['email']))) ) 
                    {

                        $name = $this->getParametre($_POST,'name');
                        $firstname = $this->getParametre($_POST,'firstname');
                        $email = $this->getParametre($_POST,'email');
                        $adress = $this->getParametre($_POST,'adress');
                        $ville = $this->getParametre($_POST,'ville');
                        $code = $this->getParametre($_POST,'code');
                        $name_item = join("\n \n", $_SESSION['panier']['name'] );

                        ini_set( 'display_errors', 1 );
 
                        error_reporting( E_ALL );
                     
                        $from = "j.fernandes11@laposte.net";
                     
                        $to = "$email";
                     
                        $subject = "Confirmation de votre commande";
                     
                        $message = "Bonjour \n Nous avons le plaisir de vous confirmer votre commande chez Burger Code \n Cet email vous servira de justificatif de commande à montrer en boutique ou au livreur \n En vous souhaitant bon appétit \n Burger CODE \n Voici le récapitulatif de votre commande : \n \n" .$name_item ;

                        $message_burger = "Le client " . $name . " " . $firstname . " qui habite " . $adress . " " . $ville . " " . $code ." a commandé : \n \n".$name_item;
                     
                        $headers = "From:" . $from;
                     
                        mail($to,$subject,$message, $headers);
                        mail($from,$subject,$message_burger, $headers);
                     
                        $this->ctrlPanier->supprimerPanier();
                        $this->ctrlCommande->commande();


                    } else {

                        throw new Exception ('<div style="text-align:center"><h4>Votre commande à déja été valider</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                    }

                }

                else {

                    throw new Exception ('<div style="text-align:center"><h4>Oups ... cette page est introuvable</h4> <br><br> <a type="button" href="index.php" class="btn btn-primary btn-lg" >Retourner à l\'accueil</a></div>');

                }


            } else {  // aucune action définie : affichage de l'accueil

                $this->ctrlAccueil->accueil();

            }

        }

        catch (Exception $e) {

            $this->erreur($e->getMessage());

        }

    }

    // Affiche une erreur
    private function erreur($msgErreur) {

        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));

    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {

        if (isset($tableau[$nom])) {

            $tableau[$nom] = trim($tableau[$nom]);
            $tableau[$nom] = stripslashes($tableau[$nom]);
            $tableau[$nom] = htmlspecialchars($tableau[$nom]);
            return ($tableau[$nom]);

        } else

            throw new Exception("Paramètre '$nom' absent");

    }

}