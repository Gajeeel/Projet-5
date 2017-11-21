<div class="container admin">
    <div class="row">
        <h1 class="form-insert"><strong>Ajouter un item</strong></h1>
        <br>
        <form class="form-add-item" id="add-item" action="index.php?action=ajouter" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" required  id="name" name="name" placeholder="Nom" >
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" required  id="description" name="description" placeholder="Description" >
            </div>
            <div class="form-group">
                <label for="price">Prix: (en €)</label>
                <input type="number" step="0.01"  required class="form-control"  id="price" name="price" placeholder="Prix" >
            </div>
            <div class="form-group">
                <label for="category">Catégorie:</label>
                <select class="form-control" id="category" name="category">

                <?php

                foreach ($categories as $category) {

                ?>
           
                    <option value="<?= $category->getId();?>"><?= $category->getName();?></option>;
                
                <?php

                }

                ?>
            
                </select>
                <p class="comments"></p>
            </div>
            <div class="form-group">
                <label for="image">Sélectionner une image:</label>
                <input type="file" required="required" id="image" name="image"> 
                <p class="comments"></p>
            </div>
            <br>
            <div class="form-actions form-insert">
                <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                <a class="btn btn-primary btn-lg" href="index.php?action=admin"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
           </div>
        </form>
    </div>
</div>   