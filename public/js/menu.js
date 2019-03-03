(function($) {

    $(document).ready(function(){

        if($(".menu").length > 0 ) {
            var content = new Menu($(".menu"));
        }

    });


    var Menu =  function(el) {

	    $(document).ready(function(){
		    var pagina;
		    var paginas;
		    var page_size;
		    var timer;
			var nomeGame;
		    iniciar();
	    });

	    function iniciar(){
		    pagina = 1;
		    paginas = 1;
		    page_size = 3;
		    timer = null;
			nomeGame = el.find("#inputBusca").val();
			el.find(".paginacao .proximo").addClass("ativo");
			el.find(".paginacao .anterior").removeClass("ativo");
		}
		    

    	////////////////////////////////
	    //menu
	    el.find(".ativarSubmenu").click(function(e){
			el.find(".submenu").fadeToggle("fast");
			el.find(".buscador").removeClass("ativo");
			el.find("#inputBusca").val("");
			el.find(".background").addClass("ativo");
			iniciar();
			e.preventDefault();
			return;
	    });

	    el.find(".background").click(function(e){
			el.find(".submenu").fadeOut("fast");
			el.find(".buscador").removeClass("ativo");
			el.find("#inputBusca").val("");
			el.find(".background").removeClass("ativo");
			iniciar();
	    });

	    $("a").not(".ativarSubmenu").click(function(e){
			el.find(".submenu").fadeOut("fast");
			el.find(".buscador").removeClass("ativo");
			el.find("#inputBusca").val("");
			el.find(".background").removeClass("ativo");
			iniciar();
	    });


    	////////////////////////////////
	    //busca		
	    el.find("#inputBusca").on('keyup',function(e) {
	    	if (el.find("#inputBusca").val() != nomeGame || !el.find(".buscador").hasClass("ativo")){
		    	if (el.find("#inputBusca").val().length >= 1){
	    			nomeGame = el.find("#inputBusca").val();
			    	iniciar();
			    	buscador();
					el.find(".background").addClass("ativo");
			    } else {
			    	el.find(".buscador").removeClass("ativo");
			    }
			}
		});

		function buscador() {

			el.find(".resultados li.resultado").not(".template").remove();
			el.find(".no-results").addClass("ativo");
		    el.find(".buscador").addClass("loading");
			el.find(".numeros .pagina").not(".template").remove();
			el.find(".submenu").fadeOut("fast");

			$.ajax({
	            url: window.homepath + "buscarGame?include=genero1,genero2,genero3,genero4,genero5,plataforma1,plataforma2,plataforma3,plataforma4,plataforma5,desenvolvedora,galeria,galeria.galeriamedia,galeria.galeriamedia.media,galeria.galeriamedia.plataforma",
	            method: 'GET',
	            dataType: 'json',
			    data: {nome: nomeGame, page_size: page_size, page: pagina},
			    beforeSend: function (data) {
	               data.setRequestHeader("Authorization", "Bearer "+window.token);
	            },
	            success: function (data) {
	                if (data.success == true){

						el.find(".resultados li.resultado").not(".template").remove();
						el.find(".numeros .pagina").not(".template").remove();

	                	if (data.extras.total > 0){
			    			el.find(".no-results").removeClass("ativo");
			    		}
						
						el.find(".buscandopor .buscandopor_value").html(el.find("#inputBusca").val());
						el.find(".total .total_value").html(data.extras.total);

						paginas = data.extras.last_page;
						pagina = data.extras.current_page;

		    			el.find(".buscador").attr("data-paginas", paginas);
		    			el.find(".buscador").attr("data-total", data.extras.total);
						el.find(".paginas .total .total_pagina").html(paginas);
						el.find(".paginas .total .pagina").html(pagina);

				    	if (pagina > 1){
							el.find(".paginacao .anterior").addClass("ativo");
				    	}

				    	if (pagina >= paginas){
							el.find(".paginacao .proximo").removeClass("ativo");
				    	} else if (paginas > 1){
							el.find(".paginacao .proximo").addClass("ativo");
				    	}

		                $.each(data.data, function(i, item) {

		                	var b = i+1;
							var template = el.find(".resultados li.resultado.template").clone().appendTo(el.find( ".resultados")).removeClass("template").addClass("resultado"+b);

							template.find(".infos .titulo").html(data.data[i].nome);


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

							
							if(data.data[i].sinopse.length > 200){
								template.find(".infos .sinopse").html(data.data[i].sinopse.substring(0,200) + "...");
							} else {
								template.find(".infos .sinopse").html(data.data[i].sinopse);
							}

							if (data.data[i].genero1){
								var generos = template.find(".generos .tag.template").clone().appendTo(template.find( ".generos")).removeClass("template").addClass(data.data[i].genero1.nome);
								generos.html(data.data[i].genero1.nome);
							}

							if (data.data[i].genero2){
								var generos2 = template.find(".generos .tag.template").clone().appendTo(template.find( ".generos")).removeClass("template").addClass(data.data[i].genero2.nome);
								generos2.html(data.data[i].genero2.nome);
							}

							if (data.data[i].genero3){
								var generos2 = template.find(".generos .tag.template").clone().appendTo(template.find( ".generos")).removeClass("template").addClass(data.data[i].genero3.nome);
								generos2.html(data.data[i].genero3.nome);
							}


		        		});

	        			for (var i = 1; i <= paginas; i++) {
							var paginacao = el.find(".numeros .pagina.template").clone().appendTo(el.find( ".numeros")).removeClass("template").addClass("pagina"+i).attr("pagina", i);
							paginacao.html(i);
							if (pagina != i){
								paginacao.addClass("ativo");
							}
	        			}

		    			el.find(".buscador").removeClass("loading");
		    			el.find(".buscador").addClass("ativo");

	                } else {
						el.find(".resultados li.resultado").not(".template").remove();
						el.find(".no-results").addClass("ativo");
					    el.find(".buscador").removeClass("loading");
						el.find(".numeros .pagina").not(".template").remove();
	                }
	            },
			    error: function(response) {
					el.find(".resultados li.resultado").not(".template").remove();
					el.find(".no-results").addClass("ativo");
				    el.find(".buscador").removeClass("loading");
					el.find(".numeros .pagina").not(".template").remove();
			    }
			});
		}

	    el.find(".paginacao .anterior").click(function(e){
	    	if (pagina > 1){
		    	pagina = pagina - 1;
	    		el.find(".paginacao .proximo").addClass("ativo");
	    		$(this).removeClass("ativo");
		    	if (pagina == 1){
					el.find(".paginacao .anterior").removeClass("ativo");
		    	}
	    		buscador();
		    }
	    });

	    el.find(".paginacao .proximo").click(function(e){
	    	if (pagina < paginas){
		    	pagina = pagina + 1;
	    		el.find(".paginacao .anterior").addClass("ativo");
		    	if (pagina >= paginas){
					el.find(".paginacao .proximo").removeClass("ativo");
		    	}
		    	buscador();
		    }
	    });

		$(document).on('click', '.numeros .pagina', function(e) {
	    	if (paginas > 1 && $(this).attr("pagina") != pagina){
	    		$(this).removeClass("ativo");
		    	pagina = $(this).attr("pagina");
		    	if (pagina == paginas){
					el.find(".paginacao .proximo").removeClass("ativo");
		    	} else {
					el.find(".paginacao .proximo").addClass("ativo");
		    	}
		    	if (pagina == 1){
					el.find(".paginacao .anterior").removeClass("ativo");
		    	} else {
					el.find(".paginacao .anterior").addClass("ativo");
		    	}
		    	buscador();
		    }
	    });




        return this;
    }

})(jQuery);