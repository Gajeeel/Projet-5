<div class="row">
	<?php
	foreach ($items as $item) {
	?>
	<div class="col-sm-6 col-md-4">
		<form class="form-item" id="<?= $item->getId() ?>" action="" method="post">
			<div class="thumbnail">
				<img src="vue/images/<?= $item->getImage() ?>">
				<div class="price"><?= number_format((float)$item->getPrice(),2,'.','');?>€</div>
				<div class="caption">
					<h4><?= $item->getName() ?></h4>
					<p><?= $item->getDescription() ?></p>
					<input type="hidden" name="name" value="<?= $item->getName() ?>">
					<input type="hidden" name="price" value="<?= number_format((float)$item->getPrice(),2,'.','');?>">
					<input type="hidden" name="image" value="<?= $item->getImage() ?>">
					<input type="hidden" name="quantite" value="<?= $item->getQuantite() ?>">
					<input type="hidden" id="variableAPasser" value="<?= $item->getId() ?>">
					<button type="submit" class="btn btn-order add_to_cart" id="<?= $item->getId() ?>" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier  </button>
				</div>
			</div>
		</form>
	</div>
	<?php
	}
	?>
</div>