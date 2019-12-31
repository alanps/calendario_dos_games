(function($) {

    $(document).ready(function(){

        if($(".menu").length > 0 ) {
            var content = new Menu($(".menu"));
        }

    });


    var Menu =  function(el) {

    	////////////////////////////////
	    //iniciar
	    $(document).ready(function(){
		    var pagina;
		    var paginas;
		    var page_size;
			var nomeGame;
		    iniciar();
		    destaques();
	    });

	    function iniciar(){
		    pagina = 1;
		    paginas = 1;
		    page_size = 3;
		    page_size_destaques = 5;
			nomeGame = el.find("#inputBusca").val();
			el.find(".paginacao .proximo").addClass("ativo");
			el.find(".paginacao .anterior").removeClass("ativo");
		}
    	////////////////////////////////
    	////////////////////////////////
    	////////////////////////////////
		    

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
    	////////////////////////////////
    	////////////////////////////////


    	////////////////////////////////
	    //menu destaques
		function destaques(data){
			$.ajax({
	            url: window.homepath + "buscarGame/?include=genero1,genero2,genero3,genero4,genero5,plataforma1,plataforma2,plataforma3,plataforma4,plataforma5,desenvolvedora,galeria,galeria.galeriamedia,galeria.galeriamedia.media,galeria.galeriamedia.plataforma",
	            method: 'GET',
	            dataType: 'json',
			    data: {page_size: page_size_destaques, cliques: "desc"},
			    beforeSend: function (data) {
	               data.setRequestHeader("Authorization", "Bearer "+window.token);
	            },
	            success: function (data) {
	                if (data.success == true){

						function imageExists(image_url){
						    var http = new XMLHttpRequest();

						    http.open('HEAD', image_url, false);
						    http.send();

						    return http.status != 404;
						}

			            $.each(data.data, function(i, item) {

		               		$.each(data.data[i].galeria.galeriamedia, function(b, item) {
		               			if (data.data[i].galeria.galeriamedia[b].tipo == "capa"){
									var urlCapa = window.uploadspath + data.data[i].galeria.galeriamedia[b].media.url;
									var imageExist = imageExists(urlCapa);
									if (imageExist == false){
			                            urlCapa = window.homepath + "images/notfound.png";
									}
									
									var template = el.find(".linha6 .submenuDestaquesItens .submenuDestaqueItem.template").clone().appendTo(el.find( ".linha6 .submenuDestaquesItens")).removeClass("template").addClass("capa"+i);
									template.find(".capaGame").attr("src", urlCapa);
									template.attr("href", window.homepath+"singlegame?game="+data.data[i].id);
								}
			    			});

			    		});

	                } else {

	                }
	            },
			    error: function(response) {

			    }
			});
		}
    	////////////////////////////////
    	////////////////////////////////
    	////////////////////////////////


    	////////////////////////////////
	    //busca
	    var buscadorTimer;
	    el.find("#inputBusca").on('keyup',function(e) {
			el.find(".submenu").hide();
	    	if (el.find("#inputBusca").val() != nomeGame || !el.find(".buscador").hasClass("ativo")){
		    	if (el.find("#inputBusca").val().length >= 1){
	    			nomeGame = el.find("#inputBusca").val();
			    	iniciar();
			    	el.find(".buscador").addClass("ativo");
					buscador();
					el.find(".background").addClass("ativo");
			    } else {
			    	el.find(".buscador").removeClass("ativo");
			    }
			}
		});

		function buscador() {
			el.find(".buscador .resultados .resultado").not(".template").remove();
			el.find(".no-results").addClass("ativo");
		    el.find(".buscador").addClass("loading");
			//el.find(".numeros .pagina").not(".template").remove();
			el.find(".total_value").html("&nbsp;");
			el.find(".total .pagina").html("&nbsp;");
			el.find(".total .total_pagina").html("&nbsp;");
			el.find(".loading .buscandopor .buscandopor_value").html("&nbsp;");

			clearTimeout(buscadorTimer);
			buscadorTimer = setTimeout(buscadorAjax, 1000);
		}

		function buscadorAjax(data){
			$.ajax({
	            url: window.homepath + "buscarGame/?include=genero1,genero2,genero3,genero4,genero5,plataforma1,plataforma2,plataforma3,plataforma4,plataforma5,desenvolvedora,galeria,galeria.galeriamedia,galeria.galeriamedia.media,galeria.galeriamedia.plataforma",
	            method: 'GET',
	            dataType: 'json',
			    data: {page_size: page_size, page: pagina, nome: nomeGame, cliques: "desc"},
			    beforeSend: function (data) {
	               data.setRequestHeader("Authorization", "Bearer "+window.token);
	            },
	            success: function (data) {
	                if (data.success == true){

						el.find(".buscador .resultados .resultado").not(".template").remove();
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

						function imageExists(image_url){
						    var http = new XMLHttpRequest();

						    http.open('HEAD', image_url, false);
						    http.send();

						    return http.status != 404;
						}

			            $.each(data.data, function(i, item) {

			            	var b = i+1;
							var template = el.find(".resultados .resultado.template").clone().appendTo(el.find( ".resultados")).removeClass("template").addClass("resultado"+b);

							template.find(".infos .titulo").html(data.data[i].nome);
							template.attr("href", window.homepath+"singlegame?game="+data.data[i].id);



			                $.each(data.data[i].galeria.galeriamedia, function(b, item) {
			                    if (data.data[i].galeria.galeriamedia[b].tipo == "capa"){
									var urlCapa = window.uploadspath + data.data[i].galeria.galeriamedia[b].media.url;
									var imageExist = imageExists(urlCapa);
									if (imageExist == false){
			                            urlCapa = window.homepath + "images/notfound.png";
									}
									
									template.find(".capa .capaGame").attr("src", urlCapa);
								}
							});

							
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
						el.find(".resultados .resultado").not(".template").remove();
						el.find(".no-results").addClass("ativo");
					    el.find(".buscador").removeClass("loading");
						//el.find(".numeros .pagina").not(".template").remove();
	                }
	            },
			    error: function(response) {
					el.find(".resultados .resultado").not(".template").remove();
					el.find(".no-results").addClass("ativo");
				    el.find(".buscador").removeClass("loading");
					//el.find(".numeros .pagina").not(".template").remove();
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
    	////////////////////////////////
    	////////////////////////////////
    	////////////////////////////////




        return this;
    }

})(jQuery);