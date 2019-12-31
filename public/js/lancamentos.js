(function($) {

    $(document).ready(function(){

        if($("#lancamentos").length > 0 ) {
            var content = new Lancamentos($("#lancamentos"));
        }

    });


    var Lancamentos =  function(el) {

    	////////////////////////////////
	    //iniciar
	    $(document).ready(function(){
			moment.locale('pt-BR');
	    	var page_size;
		    iniciar();
	    	lista();
	    });

	    function iniciar(){
		    page_size = 5;
		}

    	////////////////////////////////
	    //lancamentos

		function lista() {
			$.ajax({
	            url: window.homepath + "buscarGame?include=genero1,genero2,genero3,genero4,genero5,plataforma1,plataforma2,plataforma3,plataforma4,plataforma5,desenvolvedora,galeria,galeria.galeriamedia,galeria.galeriamedia.media,galeria.galeriamedia.plataforma",
	            method: 'GET',
	            dataType: 'json',
			    data: {page_size: page_size},
			    beforeSend: function (data) {
	               data.setRequestHeader("Authorization", "Bearer "+window.token);
	            },
	            success: function (data) {
	                if (data.success == true){

						el.find(".games .game").not(".template").remove();

		                $.each(data.data, function(i, item) {

		                	var b = i+1;
							var template = el.find(".games .game.template").clone().appendTo(el.find( ".games")).removeClass("template").addClass("game"+b);

							template.find(".titulo").html(data.data[i].nome);

							template.find(".data .dia").html(moment.unix(data.data[i].lancamento).format('DD'));
							template.find(".data .mes").html(moment.unix(data.data[i].lancamento).format('MMMM'));
							template.find(".data .ano").html(moment.unix(data.data[i].lancamento).format('YYYY'));


							function imageExists(image_url){
							    var http = new XMLHttpRequest();

							    http.open('HEAD', image_url, false);
							    http.send();

							    return http.status != 404;
							}

							if (data.data[i].plataforma1){
								template.find(".capa").removeClass("capaXbox");
								template.find(".capa").removeClass("capaPlaystation3");
								template.find(".capa").removeClass("capaPlaystation4");
								template.find(".capa").removeClass("capaPC");
								if (data.data[i].plataforma1.nome == "Xbox One" || data.data[i].plataforma1.nome == "Xbox 360"){
									template.find(".capa").addClass("capaXbox");
									var plataforma1 = "_xboxone";
								} else if (data.data[i].plataforma1.nome == "Xbox 360"){
									template.find(".capa").addClass("capaXbox");
									var plataforma1 = "_xbox360";
								} else if (data.data[i].plataforma1.nome == "Playstation 3"){
									template.find(".capa").addClass("capaPlaystation3");
									var plataforma1 = "_ps3";
								} else if (data.data[i].plataforma1.nome == "Playstation 4"){
									template.find(".capa").addClass("capaPlaystation4");
									var plataforma1 = "_ps4";
								} else if (data.data[i].plataforma1.nome == "PC"){
									template.find(".capa").addClass("capaPC");
									var plataforma1 = "_pc";
								}
							}

							var capa = window.homepath + "images/notfound.png";
		               		$.each(data.data[i].galeria.galeriamedia, function(b, item) {
		               			var c = 0;
		               			if (data.data[i].galeria.galeriamedia[b].tipo == "capa" && c == 0){
									capa = window.uploadspath + data.data[i].galeria.galeriamedia[b].media.url;
									c = 1;
								}
							});

							var position = capa.length - 4;
							var urlCapa = [capa.slice(0, position), capa.slice(position)].join('');

							var imageExist = imageExists(urlCapa);
							if (imageExist == false){
								urlCapa = window.homepath + "images/notfound.png";
							}

							template.find(".capa .capaGame").attr("src", urlCapa);

							if (data.data[i].genero1){
								var generos = template.find(".tag.template").clone().appendTo(template).removeClass("template").addClass(data.data[i].genero1.nome);
								generos.html(data.data[i].genero1.nome);
							}

							if (data.data[i].genero2){
								var generos2 = template.find(".tag.template").clone().appendTo(template).removeClass("template").addClass(data.data[i].genero2.nome);
								generos2.html(data.data[i].genero2.nome);
							}

							if (data.data[i].genero3){
								var generos2 = template.find(".tag.template").clone().appendTo(template).removeClass("template").addClass(data.data[i].genero3.nome);
								generos2.html(data.data[i].genero3.nome);
							}

		        		});

		    			el.removeClass("loading");

	                } else {

	                }
	            },
			    error: function(response) {

			    }
			});
		}




        return this;
    }

})(jQuery);