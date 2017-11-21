<div class="col-lg-6 col-lg-offset-3 co">
        <center><h2 style="font-size:40px;" class="text-logo">Connexion</h2></center>
        <form  id="connexion" method="POST" action="index.php?action=connexion">
            <div class="form-group form-insert col-lg-8 col-lg-offset-2">
                <input type="text" placeholder="Nom d'utilisateur" name="pseudo" style="height:45px;" class="form-control connexion"  required >
            </div>
            <div class="form-group form-insert col-lg-8 col-lg-offset-2">
                <input type="password" placeholder="Mot de passe" name="mdp" id="mdp" style="height:45px;"  required class="form-control connexion" >
                <p class="comments"></p>
            </div>
            <div class="form-group form-insert col-lg-8 col-lg-offset-2">
                <button type="submit" name="connexion" class="btn btn-primary btn-lg center" >Se connecter</button>   
            </div>     
        </form>
    </div>  
</div>