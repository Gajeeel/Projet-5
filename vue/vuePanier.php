<div class="container panier">
    <div class="row">
        <div class="col-lg-12">
            <form id="panier" method="POST" action="index.php?action=gotoform">
            <div class="panel panel-info" id="thepanier">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4><span class="glyphicon glyphicon-shopping-cart"></span> Votre panier</h4>
                            </div>
                            <div class="col-lg-6">
                                <a href="index.php" type="button" class="btn btn-primary btn-lg btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Accueil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 

                if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                    
                    $nbArticles=count($_SESSION['panier']['name']);
                    if ($nbArticles <= 0) {

                        ?>

                        <h2 style="text-align:center;">Votre panier est vide </h2>

                        <?php

                    } else {

                        for ($i=0 ;$i < $nbArticles ; $i++) {

                        ?>

                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-2"><img class="img-responsive" src="vue/images/<?= $_SESSION['panier']['image'][$i] ?>">
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="product-name"><strong><?=htmlspecialchars($_SESSION['panier']['name'][$i]);?></strong></h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-6 text-right">
                                        <h4><strong><?=htmlspecialchars(number_format((float)$_SESSION['panier']['price'][$i],2,'.',''));?>€<span class="text-muted"></span></strong></h4>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <h4><strong>Quantité : <?= htmlspecialchars($_SESSION['panier']['quantite'][$i]);?><span class="text-muted"></span></strong></h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="index.php?action=deleteofpanier&amp;name=<?=htmlspecialchars($_SESSION['panier']['name'][$i]);?>""  class="btn btn-link btn-lg">
                                            <span class="glyphicon glyphicon-trash"> </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                        }


                    }

                } else {

                    echo '<h2 style="text-align:center;">Votre panier est vide </h2>';

                }

                ?>
                <br>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-lg-9">
                            <h3 class="text-right">Total <strong>

                            <?php 

                            if (isset($_SESSION['panier'])){ 

                                $montant=0;
                                for($i = 0; $i < count($_SESSION['panier']['name']); $i++) {

                                    $montant += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['price'][$i];

                                } 
                        
                            ?>

                                    <?= number_format((float)$montant,2,'.',''); ?>

                                    <?php

                            }

                            ?>  
                        </strong>€</h3>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
