@include('head')

<link rel="stylesheet" href="{{ asset('css/singlegame.css') }}">
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/moment-with-locales.js') }}"></script>
<script src="{{ asset('js/singlegame.js') }}"></script>

<section id="singlegame" class="loading">

    <div class="container">
        <div class="row">

			<div class="col-md-12">

				<div class="game">

        			<div class="row">
						<div class="col-md-4">

							<div class="ficha">
								<div class="data">07 de Maio de 2018</div>
								<div class="semana">Terça</div>
		                        <div class="capa">
		                            <img class="capaGame" src="{{ asset('images/notfound.png') }}">
		                        </div>
		                        <div class="nome">Far Cry 5</div>
								<div class="generos">
			                        <div class="tag template">Ação</div>
			                    </div>
		                        <div class="desenvolvedora">
									<span class="desenvolvedora_titulo">Desenvolvedora:</span>
		                        	<span class="titulo">Activision</span>
		                        </div>
								<div class="plataformas">
									<div class="plataformas_titulo">Plataformas:</div>
									<div class="plataforma template">
										<span class="icon"></span>
										<span class="console">Xbox One</span>
									</div>
			                    </div>
							</div>

						</div>

						<div class="col-md-8">

							<div class="maisInfos">
								<h1 class="titulo">Descricao</h1>
								<div class="descricao">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit.</div>

								<h1 class="titulo titulo_galeria">Galeria</h1>
				                <ul class="fotos">
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('images/notfound.png') }}">
				                        </div>
				                    </li>
				                </ul>
							</div>

						</div>
					</div>


					<div class="videos">
	        			<div class="row">
							<div class="col-md-6 trailerContainer">
	                        	<video width="540" height="300" class="trailer" controls>
									<source src="" type="video/mp4">
									Your browser does not support the video tag.
								</video>
		                        <div class="legenda">Trailer</div>
							</div>

							<div class="col-md-6 gameplayContainer">
	                        	<video width="540" height="300" class="gameplay" controls>
									<source src="" type="video/mp4">
									Your browser does not support the video tag.
								</video>
		                        <div class="legenda">Gameplay</div>
							</div>
						</div>
					</div>


				</div>
					
				<div class="loadingDiv">
					<img src="{{ asset('images/loading.svg') }}" class="loading">
				</div>

			</div>

        </div>
    </div>

</section>

@include('footer')