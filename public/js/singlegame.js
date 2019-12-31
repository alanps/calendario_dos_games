(function($) {

    $(document).ready(function(){

        if($("#singlegame").length > 0 ) {
            var content = new SingleGame($("#singlegame"));
        }

    });


    var SingleGame =  function(el) {

    	////////////////////////////////
	    //iniciar
        $(document).ready(function(){
            moment.locale('pt-BR');
            lista();
        });


        //////////////////////////////////////////////
        //lightbox
        $(document).on("click", ".fotos .foto",function(e){
            var lightbox = $(this).find("img").attr("src");
            el.append("<div class='lightbox_div'><div class='seta seta_esquerda'><span class='icon-arrow-left'></span></div><img src='"+lightbox+"' class='lightbox_foto'><div class='seta seta_direita'><span class='icon-arrow-right'></span></div></div>");
            el.find(".lightbox_foto").addClass($(this).attr('class').split(' ')[1]);

            var item = el.find(".lightbox_foto").attr('class').split(' ')[1];
            item =  Number(item.split("foto")[1]);
            itemNext = Number(item);
            var total = el.find(".fotos .foto").not('.template').length;

            if (itemNext <= 1){
                el.find(".seta.seta_esquerda").addClass("nomore");
            } else {
                el.find(".seta.seta_esquerda").removeClass("nomore");
            }

            if (itemNext >= total){
                el.find(".seta.seta_direita").addClass("nomore");
            } else {
                el.find(".seta.seta_direita").removeClass("nomore");
            }

            e.stopPropagation();
            e.preventDefault();
            return false;
        });

        $(document).on("click", "html",function(e){
            if ($(".lightbox_div").length > 0) {
                el.find(".lightbox_div").remove();
            }
        });

        $(document).on("click", ".lightbox_div img",function(e){
            e.stopPropagation();
            e.preventDefault();
            return false;
        });

        $(document).on("click", ".seta.seta_direita",function(e){
            var item = el.find(".lightbox_foto").attr('class').split(' ')[1];
            item =  Number(item.split("foto")[1]);
            itemNext = Number(item) + 1;
            var total = el.find(".fotos .foto").not('.template').length;
            var imgUrl = el.find(".fotos .foto"+itemNext).find("img").attr('src');

            if (itemNext <= total){
                el.find(".lightbox_div img").attr("src", imgUrl);
                el.find(".lightbox_div img").removeClass("foto"+item);
                el.find(".lightbox_div img").addClass("foto"+itemNext);
            }

            el.find(".seta.seta_esquerda").removeClass("nomore");
            if (itemNext >= total){
                el.find(".seta.seta_direita").addClass("nomore");
            } else {
                el.find(".seta.seta_direita").removeClass("nomore");
            }

            e.stopPropagation();
            e.preventDefault();
            return false;
        });

        $(document).on("click", ".seta.seta_esquerda",function(e){
            var item = el.find(".lightbox_foto").attr('class').split(' ')[1];
            item =  Number(item.split("foto")[1]);
            itemNext = Number(item) - 1;
            var total = el.find(".fotos .foto").not('.template').length;
            var imgUrl = el.find(".fotos .foto"+itemNext).find("img").attr('src');

            if (itemNext >= 1){
                el.find(".lightbox_div img").attr("src", imgUrl);
                el.find(".lightbox_div img").removeClass("foto"+item);
                el.find(".lightbox_div img").addClass("foto"+itemNext);
            }

            el.find(".seta.seta_direita").removeClass("nomore");
            if (itemNext <= 1){
                el.find(".seta.seta_esquerda").addClass("nomore");
            } else {
                el.find(".seta.seta_esquerda").removeClass("nomore");
            }

            e.stopPropagation();
            e.preventDefault();
            return false;
        });



        ////////////////////////////////
        //singlegame

        ////////////////////////////////
        function getParameterByName(name) {
          name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
          var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
              results = regex.exec(location.search);
          return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        var game = getParameterByName("game");

        //el.addClass("loading");

        function lista() {
            $.ajax({
                url: window.homepath + "buscarGame/"+game+"?include=genero1,genero2,genero3,genero4,genero5,plataforma1,plataforma2,plataforma3,plataforma4,plataforma5,desenvolvedora,galeria,galeria.galeriamedia,galeria.galeriamedia.media,galeria.galeriamedia.plataforma",
                method: 'GET',
                dataType: 'json',
                data: {page_size: 1},
                beforeSend: function (data) {
                   data.setRequestHeader("Authorization", "Bearer "+window.token);
                },
                success: function (data) {
                    if (data.success == true){

                        el.find(".game .ficha .nome").html(data.data[0].nome);
                        el.find(".game .ficha .desenvolvedora .titulo").html(data.data[0].desenvolvedora.nome);
                        el.find(".game .ficha .data").html(moment.unix(data.data[0].lancamento).format('DD [de] MMMM [de] YYYY'));
                        el.find(".game .ficha .semana").html(moment.unix(data.data[0].lancamento).format('dddd'));
                        el.find(".game .maisInfos .descricao").html(data.data[0].sinopse);


                        function imageExists(image_url){
                            var http = new XMLHttpRequest();

                            http.open('HEAD', image_url, false);
                            http.send();

                            return http.status != 404;
                        }

                        var gameplayCount = 0;
                        var trailerCount = 0;
                        var screenshots = 0;
                        $.each(data.data[0].galeria.galeriamedia, function(i, item) {

                            if (data.data[0].galeria.galeriamedia[i].tipo == "screenshot"){
                                if (data.data[0].galeria.galeriamedia[i]){
                                    if (data.data[0].galeria.galeriamedia[i].media.url){

                                        screenshots++;
                                        var capa = data.data[0].galeria.galeriamedia[i].media.url;
                                        var position = capa.length - 4;

                                        var imageExist = imageExists(window.uploadspath + data.data[0].galeria.galeriamedia[i].media.url);
                                        if (imageExist == true){
                                            var foto = el.find(".game .fotos .foto.template").clone().appendTo(el.find( ".game .fotos")).removeClass("template").addClass("foto"+screenshots);
                                            foto.find(".imagem").attr("src", window.uploadspath + data.data[0].galeria.galeriamedia[i].media.url);
                                        } else if (imageExist == false){
                                            el.find(".titulo_galeria").hide();
                                            urlCapa = window.homepath + "images/notfound.png";
                                        }

                                    }
                                }
                            } else {
                                el.find(".titulo_galeria").hide();
                            }

                            if (data.data[0].galeria.galeriamedia[i].tipo == "capa"){
                                var capa = data.data[0].galeria.galeriamedia[i].media.url;
                                var urlCapa = window.uploadspath + capa;

                                var imageExist = imageExists(urlCapa);
                                if (imageExist == false){
                                    urlCapa = window.homepath + "images/notfound.png";
                                }

                                el.find(".capa .capaGame").attr("src", urlCapa);
                            }

                            if (data.data[0].galeria.galeriamedia[i].tipo == "trailer"){
                                trailerCount = 1;
                                var trailer = window.uploadspath + data.data[0].galeria.galeriamedia[i].media.url;
                                el.find(".videos .trailer").attr("src", trailer);
                            }

                            if (data.data[0].galeria.galeriamedia[i].tipo == "gameplay"){
                                gameplayCount = 1;
                                var gameplay = window.uploadspath + data.data[0].galeria.galeriamedia[i].media.url;
                                el.find(".videos .gameplay").attr("src", gameplay);
                            }

                        });


                        if (trailerCount == 0){
                            el.find(".trailerContainer").hide();
                        }
                        if (gameplayCount == 0){
                            el.find(".gameplayContainer").hide();
                        }

                        el.find(".game .fotos .foto.template").remove();

                        for (var i = 1; i <= 5; i++) {
                            var g = "genero"+i;
                            if (data.data[0][g]){
                                var generos = el.find(".generos .tag.template").clone().appendTo(el.find( ".generos")).removeClass("template").addClass(data.data[0][g].nome);
                                generos.html(data.data[0][g].nome);
                            }
                        }

                        for (var i = 1; i <= 5; i++) {
                            var p = "plataforma"+i;
                            if (data.data[0][p]){
                                var plataforma = el.find(".plataformas .plataforma.template").clone().appendTo(el.find( ".plataformas")).removeClass("template").addClass(data.data[0][p].slug);
                                plataforma.find(".console").html(data.data[0][p].nome);
                                plataforma.find(".icon").addClass("icon-"+data.data[0][p].slug);
                            }
                        }

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