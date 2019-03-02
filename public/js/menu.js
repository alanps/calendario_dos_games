(function($) {

    $(document).ready(function(){

        if($(".menu").length > 0 ) {
            var content = new Menu($(".menu"));
        }

    });


    var Menu =  function(el) {


	    //menu
	    el.find(".ativarSubmenu").click(function(e){
			el.find(".submenu").fadeToggle("fast");
			e.preventDefault();
			return;
	    });

	    $(window).scroll(function (event) {
			el.find(".submenu").fadeOut("fast");
	    });

	    el.find(".background").click(function(e){
			el.find(".submenu").fadeOut("fast");
	    });


	    //busca
	    el.find(".icon-search").click(function(e){
	    	buscador();
	    	el.find(".buscador").addClass("ativo");
	    });

	    el.find("#inputBusca").on('keyup',function(e) {
		    if(e.which == 13) {
		    	buscador();
		    	el.find(".buscador").addClass("ativo");
		    }
		});

		function buscador() {
			$.ajax({
	            url: window.homepath + "buscar",
	            method: 'POST',
	            dataType: 'json',
			    data: {id: 1},
	            success: function (data) {

	            },
			    error: function(response) {
			        console.log(textStatus, errorThrown);
			    }
			});
		}




        return this;
    }

})(jQuery);