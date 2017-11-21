function noJs(){

	var self = this;

	this.init = function(){

        self.noJavascript();

    };

    this.noJavascript = function(){

    	element = $('#message_avertissement_javascript');
        element.hide();

    };

}

$(document).ready(function(){ 
    var noJava = new noJs();
    noJava.init();
});