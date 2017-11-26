<div class="row">
   <div class="col-lg-10 col-lg-offset-1">
        <form id="contact-form" method="post" action="index.php?action=fin" role="form">
            <div class="row">
                <div class="col-md-6">
                    <label for="firstname">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" required class="form-control" placeholder="Votre prénom">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="name">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" required placeholder="Votre Nom">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="email">Email <span class="blue">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" required  placeholder="Votre Email">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="adress">Adresse <span class="blue">*</span></label>
                    <input id="adress" type="text" name="adress" class="form-control" required placeholder="Votre adresse">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="ville">Ville <span class="blue">*</span></label>
                    <input id="ville" type="text" name="ville" class="form-control" required  placeholder="Votre ville">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="code">Code Postal <span class="blue">*</span></label>
                    <input id="code" type="tel" name="code" class="form-control" required placeholder="Votre code postal">
                    <p class="comments"></p>
                </div>
                <div class="col-md-12 choix">
                    <input type="radio" name="livraison" value="A domicile"> Livraison à domicile 
                    <br>
                    <br>
                    <input type="radio" name="livraison" value="Retrait en boutique" checked > Retrait en boutique
                </div>
                <div class="col-md-12">
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="button1" value="Valider votre commande">
                </div>    
            </div>
        </form>
    </div>
</div>
