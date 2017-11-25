function Ajax (){

    var self = this;

    this.init = function(){

        self.panAjax();
        self.connexionAjax();
        self.gotoformAjax();

    };

    this.panAjax = function() {

        $('.form-item').submit(function(e){ //user clicks form submit button

            e.preventDefault();
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('S\'ajoute au panier ...');

            $.ajax({ //make ajax request to cart_process.php
                url: "index.php?action=addpanier",
                type: "POST",
                data: form_data,
                dataType: 'json',
                success : function(json){

                    swal("Le produit a été ajouté à votre panier", "", "success");
                    button_content.html('Ajouter au panier'); //reset button text to original text
                    console.log(form_data);

                },

                error : function(json){

                    swal("Oups ...","Erreur ! Veuillez contacter l\'admin","error");
                    button_content.html('Ajouter au panier'); //reset button text to original text
                    console.log(form_data);

                },

            });

        });

    };

    this.connexionAjax = function() {

        $('#connexion').on('submit', function(e) {
            e.preventDefault(); // On empêche de soumettre le formulaire
         
            var $this = $(this); // L'objet jQuery du formulaire
         
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // On récupère l'action (ici action.php)
                type: $this.attr('method'), // On récupère la méthode (post)
                data: $this.serialize(), // On sérialise les données = Envoi des valeurs du formulaire
                dataType: 'json', // JSON
                success: function(json) { // Si ça c'est passé avec succès
                // ici on teste la réponse
                    if(json.reponse === 'ok') {
                        
                        window.location.href = 'index.php?action=admin';
                        
                    } else {
                        
                        $('#mdp + .comments').html(json.reponse);
                    }
                }

            });
         
        });

    };

    this.gotoformAjax = function() {

        $('#panier').on('submit', function(e) {
            
            e.preventDefault(); // On empêche de soumettre le formulaire
         
            var $this = $(this); // L'objet jQuery du formulaire
         
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // On récupère l'action (ici action.php)
                type: $this.attr('method'), // On récupère la méthode (post)
                data: $this.serialize(), // On sérialise les données = Envoi des valeurs du formulaire
                dataType: 'json', // JSON
                success: function(json) { // Si ça c'est passé avec succès
                // ici on teste la réponse
                    if(json.rep === 'ok') {
                        
                        window.location.href = 'index.php?action=form';
                        
                    } else {
                        
                        swal("Pas si vite !", json.rep , "error");
                        
                    }
                }

            });
         
        });

    };

}


$(document).ready(function(){ 
    var monAjax = new Ajax();
    monAjax.init();
});  