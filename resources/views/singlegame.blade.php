@include('head')

<link rel="stylesheet" href="{{ asset('css/singlegame.css') }}">
<script src="{{ asset('js/singlegame.js') }}"></script>

<section id="singlegame">

    <div class="container">
        <div class="row">

			<div class="col-md-12">

				<div class="game">

        			<div class="row">
						<div class="col-md-4">

							<div class="ficha">
								<div class="data">07 de Maio de 2018</div>
								<div class="semana">Terça</div>
		                        <div class="capa capaXbox">
		                            <img class="capaGame" src="{{ asset('../storage/app/public/uploads/5b4e242ea4e14_xboxone.jpg') }}">
		                        </div>
		                        <div class="titulo">Far Cry 5</div>
								<div class="generos">
			                        <div class="tag template">Ação</div>
			                    </div>
		                        <div class="desenvolvedora">Desenvolvedora: <span class="titulo">Activision</span></div>
							</div>

						</div>

						<div class="col-md-8">

							<div class="maisInfos">
								<h1 class="titulo">Descricao</h1>
								<div class="descricao">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit.</div>

								<h1 class="titulo">Galeria</h1>
				                <ul class="fotos">
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a.jpg') }}">
				                        </div>
				                    </li>
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a3.jpg') }}">
				                        </div>
				                    </li>
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a4.jpg') }}">
				                        </div>
				                    </li>
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a5.jpg') }}">
				                        </div>
				                    </li>
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a7.jpg') }}">
				                        </div>
				                    </li>
				                    <li class="foto template">
				                        <div class="imagemContainer">
				                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a8.jpg') }}">
				                        </div>
				                    </li>
				                </ul>
							</div>

						</div>
					</div>


					<div class="videos">
	        			<div class="row">
							<div class="col-md-6">
		                        <div class="imagemContainer">
		                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a10.jpg') }}">
		                        </div>
		                        <div class="legenda">Trailer</div>
							</div>

							<div class="col-md-6">
		                        <div class="imagemContainer">
		                            <img class="imagem" src="{{ asset('../storage/app/public/uploads/5b61bce6e2f7a10.jpg') }}">
		                        </div>
		                        <div class="legenda">Gameplay</div>
							</div>
						</div>
					</div>

				</div>

			</div>

        </div>
    </div>

</section>

@include('footer')