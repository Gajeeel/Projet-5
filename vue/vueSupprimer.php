<?php

require 'vendor/autoload.php';

foreach($items as $item){

?>

<div class="container admin">
    <div class="row form-insert">
        <h1><strong>Supprimer un item</strong></h1>
        <br>
        <form class="form" action="index.php?action=delete&amp;id=<?= $item->getId();?>" role="form" method="post">
            <p class="alert alert-danger">Etes vous sur de vouloir supprimer l'item : <?= $item->getName();?> ?</p>
            <div class="form-actions">
              <button type="submit" class="btn btn-danger btn-lg">Oui</button>
              <a class="btn btn-default btn-lg" href="index.php?action=admin">Non</a>
            </div>
        </form>
    </div>
</div>

<?php

}

?>