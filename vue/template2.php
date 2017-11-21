<!DOCTYPE html>
<html>
	<head>
		<title>Burger Code</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="vue/css/style.css">
        <script type="text/javascript" src="vue/js/ajax.js"></script>
        <script type="text/javascript" src="vue/js/no.js"></script>
    </head>

    <body>
    	<div class="container site">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#monMenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand text-logo" style="font-size:1.4em" href="index.php"> BURGER CODE</a>
                    </div>
                    <div class="collapse navbar-collapse" style="text-align:center;" id="monMenu">
                        <ul class="nav navbar-nav">
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php' ? ' class="active"' : ''?> ><a href="index.php" >Accueil</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=category&id=1' ? ' class="active"' : ''?> ><a href="index.php?action=category&id=1" >Menus</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=category&id=2' ? ' class="active"' : ''?> ><a href="index.php?action=category&id=2" >Burgers</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=category&id=3' ? ' class="active"' : ''?> ><a href="index.php?action=category&id=3" >Snacks</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=category&id=4' ? ' class="active"' : ''?> ><a href="index.php?action=category&id=4" >Salades</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=category&id=5' ? ' class="active"' : ''?> ><a href="index.php?action=category&id=5" >Boissons</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=category&id=6' ? ' class="active"' : ''?> ><a href="index.php?action=category&id=6" >Desserts</a></li>
                            <li role="presentation" <?=$_SERVER['REQUEST_URI'] == '/index.php?action=gotopanier' ? ' class="active"' : ''?> ><a href="index.php?action=gotopanier" >Panier</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php?action=deconnexion"><span class=" glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <br>
            <br>
			<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
            </div>
            <br>
            <div class="container admin form-insert" id="message_avertissement_javascript">
                <h4>Attention, vous avez désactivé Javascript sur votre navigateur, le site risque de ne pas bien fonctionner . Voici un tutoriel pour vous aider a activer javascript</h4>
                <br>
                <a type="button" class="btn btn-primary btn-lg" href="https://www.enable-javascript.com/fr/">Ici</a>
            </div>
        <?= $contenu ?>
        <br>
        <div class="footer-copyright">
            <div class="container-fluid">
                <strong>BURGER CODE</strong>
            </div>
        </div>
    </body>
</html>