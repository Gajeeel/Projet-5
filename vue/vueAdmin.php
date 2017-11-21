<div class="container admin ">
    <div class="row">
        <h1><strong>Liste des items   </strong><a href="index.php?action=gotoajouter" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
        <div class="table-responsive">
        <table class="table table-striped table-bordered col-lg-12">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($items as $item) {
            ?>
                <tr>
                    <td><?= $item->getName();?></td>
                    <td><?= $item->getDescription();?></td>
                    <td><?= number_format((float)$item->getPrice(),2,'.','');?>€</td>
                    <td><?= $item->getCategory();?></td>
                    <td width=300>
                        <a class="btn btn-default" href="index.php?action=gotoview&id=<?= $item->getId();?>"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>
                        <a class="btn btn-primary" href="index.php?action=gotomodifier&id=<?= $item->getId();?>"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>
                        <a class="btn btn-danger" href="index.php?action=gotodelete&id=<?= $item->getId();?>"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
