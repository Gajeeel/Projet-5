<div class="container admin">
    <div class="row">

        <?php

        foreach($items as $item){

        ?>

        <div class="col-sm-6">
            <h1 class="form-insert"><strong>Modifier un item</strong></h1>
            <br>
            <form class="form" action="index.php?action=modifier&amp;id=<?= $item->getId();?>" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" required id="name" name="name" placeholder="Nom" value="<?= $item->getName();?>">
                    <span class="help-inline"></span>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" required id="description" name="description" placeholder="Description" value="<?= $item->getDescription();?>">
                    <span class="help-inline"></span>
                </div>
                <div class="form-group">
                <label for="price">Prix: (en €)</label>
                    <input type="number" step="0.01" class="form-control" required id="price" name="price" placeholder="Prix" value="<?= number_format((float)$item->getPrice(),2,'.','');?>">
                    <span class="help-inline"></span>
                </div>


                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <select class="form-control" id="category" name="category">

                    <?php

                    foreach ($categories as $category) {

                        if( $category->getId() == $item->getCategory() ) {

                        ?>

                            <option selected="selected" value="<?= $category->getId();?>"><?= $category->getName(); ?></option>

                        <?php

                        } else {

                        ?>

                            <option value="<?= $category->getId();?>"><?= $category->getName();?></option>

                        <?php

                        }

                    }

                    ?>

                    </select>
                    <span class="help-inline"></span>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <p><?= $item->getImage();?></p>
                    <label for="image">Sélectionner une nouvelle image:</label>
                    <input type="file" id="image" name="image"> 
                    <span class="help-inline"></span>
                </div>
                <br>
                <div class="form-actions form-insert">
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                    <a class="btn btn-primary btn-lg" href="index.php?action=admin"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
               </div>
            </form>
        </div>
        <div class="col-sm-6 site">
            <div class="thumbnail">
                <img src="vue/images/<?= $item->getImage();?>" alt="...">
                <div class="price"><?= number_format((float)$item->getPrice(),2,'.','');?>€</div>
                <div class="caption">
                    <h4><?= $item->getName();?></h4>
                    <p><?= $item->getDescription();?></p>
                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                </div>
            </div>
        </div>

        <?php

        }

        ?>

    </div>
</div>   