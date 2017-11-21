<div class="container admin">
    <div class="row">

        <?php

        foreach($items as $item) {

        ?>

        <div class="col-sm-6">
            <h1 class="form-insert"><strong>Voir un item</strong></h1>
            <br>
            <form>
                <div class="form-group">
                  <label>Nom:</label> <?= $item->getName();?>
                </div>
                <div class="form-group">
                  <label>Description:</label> <?= $item->getDescription();?>
                </div>
                <div class="form-group">
                  <label>Prix:</label> <?= number_format((float)$item->getPrice(),2,'.','');?>€
                </div>
                <div class="form-group">
                  <label>Catégorie:</label> <?= $item->getCategory();?>
                </div>
                <div class="form-group">
                  <label>Image:</label> <?= $item->getImage();?>
                </div>
            </form>
            <br>
            <div class="form-actions form-insert">
              <a class="btn btn-primary btn-lg" href="index.php?action=admin"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>
        </div> 
        <div class="col-sm-6 site">
            <div class="thumbnail">
                <img src="vue/images/<?= $item->getImage();?>" alt="...">
                <div class="price"><?= number_format((float)$item->getPrice(),2,'.','');?>€</div>
                <div class="caption ">
                    <h4><?= $item->getName();?></h4>
                    <p><?= $item->getDescription();?></p>
                    <a href="#" class="btn btn-order btn-lg" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                </div>
            </div>
        </div>

        <?php

        }

        ?>

    </div>
</div>   