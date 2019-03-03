(function($) {

    $(document).ready(function(){

        if($("#lancamentos").length > 0 ) {
            var content = new Lancamentos($("#lancamentos"));
        }

    });


    var Lancamentos =  function(el) {


    	////////////////////////////////
	    //lancamentos
		moment.locale('pt-BR');
	    lista();

	    var page_size = 5;
		function lista() {

			$.ajax({
	            url: window.homepath + "buscarGame?include=genero1,genero2,genero3,genero4,genero5,plataforma1,plataforma2,plataforma3,plataforma4,plataforma5,desenvolvedora,galeria,galeria.galeriamedia,galeria.galeriamedia.media,galeria.galeriamedia.plataforma",
	            method: 'GET',
	            dataType: 'json',
			    data: {page_size: page_size, orderby: "lancamento"},
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

							template.find(".data .dia").html(moment.unix(data.data[i].lancamento).add('days', 1).format('DD'));
							template.find(".data .semana").html(moment.unix(data.data[i].lancamento).add('days', 1).format('dddd'));

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

							var capa = window.uploadspath + data.data[i].galeria.galeriamedia[0].media.url;
							var position = capa.length - 4;
							var urlCapa = [capa.slice(0, position), plataforma1, capa.slice(position)].join('');

							var imageExist = imageExists(urlCapa);
							if (imageExist == false){

								if (data.data[i].plataforma2){
									template.find(".capa").removeClass("capaXbox");
									template.find(".capa").removeClass("capaPlaystation3");
									template.find(".capa").removeClass("capaPlaystation4");
									template.find(".capa").removeClass("capaPC");
									if (data.data[i].plataforma2.nome == "Xbox One" || data.data[i].plataforma2.nome == "Xbox 360"){
										template.find(".capa").addClass("capaXbox");
										var plataforma2 = "_xboxone";
									} else if (data.data[i].plataforma2.nome == "Xbox 360"){
										template.find(".capa").addClass("capaXbox");
										var plataforma2 = "_xbox360";
									} else if (data.data[i].plataforma2.nome == "Playstation 3"){
										template.find(".capa").addClass("capaPlaystation3");
										var plataforma2 = "_ps3";
									} else if (data.data[i].plataforma2.nome == "Playstation 4"){
										template.find(".capa").addClass("capaPlaystation4");
										var plataforma2 = "_ps4";
									} else if (data.data[i].plataforma2.nome == "PC"){
										template.find(".capa").addClass("capaPC");
										var plataforma2 = "_pc";
									}
								}

								urlCapa = [capa.slice(0, position), plataforma2, capa.slice(position)].join('');
							}

							var imageExist2 = imageExists(urlCapa);
							if (imageExist2 == false){

								if (data.data[i].plataforma3){
									template.find(".capa").removeClass("capaXbox");
									template.find(".capa").removeClass("capaPlaystation3");
									template.find(".capa").removeClass("capaPlaystation4");
									template.find(".capa").removeClass("capaPC");
									if (data.data[i].plataforma3.nome == "Xbox One" || data.data[i].plataforma3.nome == "Xbox 360"){
										template.find(".capa").addClass("capaXbox");
										var plataforma3 = "_xboxone";
									} else if (data.data[i].plataforma3.nome == "Xbox 360"){
										template.find(".capa").addClass("capaXbox");
										var plataforma3 = "_xbox360";
									} else if (data.data[i].plataforma3.nome == "Playstation 3"){
										template.find(".capa").addClass("capaPlaystation3");
										var plataforma3 = "_ps3";
									} else if (data.data[i].plataforma3.nome == "Playstation 4"){
										template.find(".capa").addClass("capaPlaystation4");
										var plataforma3 = "_ps4";
									} else if (data.data[i].plataforma3.nome == "PC"){
										template.find(".capa").addClass("capaPC");
										var plataforma3 = "_pc";
									}
								}

								urlCapa = [capa.slice(0, position), plataforma3, capa.slice(position)].join('');
							}

							var imageExist3 = imageExists(urlCapa);
							if (imageExist3 == false){
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