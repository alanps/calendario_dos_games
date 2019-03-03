<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<script src="{{ asset('js/menu.js') }}"></script>

<div class="menu">
	<div class="container">

		<div class="row">

			<div class="col-md-2">
				<div class="logoContainer">
					<a href="{{ route('index') }}">
						<img class="logo" src="{{ asset('images/logo.png') }}">
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<ul class="menuItens">
					<a href="{{ route('index') }}">
						<li class="menuItem menuItemInicial">Página Inicial</li>
					</a>
					<a href="#" class="ativarSubmenu">
						<li class="menuItem menuItemLancamentos">Games</li>
					</a>
					<a href="{{ route('sobre') }}">
						<li class="menuItem menuItemSobre">Sobre</li>
					</a>
				</ul>
			</div>

			<div class="col-md-4">
				<div class="busca">
					<label for="inputBusca">Buscar:</label>
					<input name="inputBusca" id="inputBusca" type="text" placeholder="digite o nome do jogo">
					<span class="icon-search"></span>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="background"></div>

				<div class="submenu" style="display: none;">
					
					<div class="container containerSubmenu">
						<div class="row">

							<div class="col-md-2">
								<div class="xboxOne">
									<div class="console">
										<span class="icon icon-xbox"></span>
										<span class="titulo">Xbox One</span>
									</div>
									<ul class="submenuItens">
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem todosOsGames">Todos os Games</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem lancamentos">Lançamentos</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem porgenero">Por Genêro</li>
										</a>
									</ul>
								</div>
							</div>

							<div class="col-md-2">
								<div class="xbox360">
									<div class="console">
										<span class="icon icon-xbox"></span>
										<span class="titulo">Xbox 360</span>
									</div>
									<ul class="submenuItens">
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem todosOsGames">Todos os Games</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem lancamentos">Lançamentos</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem porgenero">Por Genêro</li>
										</a>
									</ul>
								</div>
							</div>

							<div class="col-md-2">
								<div class="playstation4">
									<div class="console">
										<span class="icon icon-playstation4"></span>
										<span class="titulo">Playstation 4</span>
									</div>
									<ul class="submenuItens">
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem todosOsGames">Todos os Games</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem lancamentos">Lançamentos</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem porgenero">Por Genêro</li>
										</a>
									</ul>
								</div>
							</div>

							<div class="col-md-2">
								<div class="playstation3">
									<div class="console">
										<span class="icon icon-playstation3"></span>
										<span class="titulo">Playstation 3</span>
									</div>
									<ul class="submenuItens">
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem todosOsGames">Todos os Games</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem lancamentos">Lançamentos</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem porgenero">Por Genêro</li>
										</a>
									</ul>
								</div>
							</div>

							<div class="col-md-2">
								<div class="pc">
									<div class="console">
										<span class="icon icon-windows"></span>
										<span class="titulo">PC</span>
									</div>
									<ul class="submenuItens">
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem todosOsGames">Todos os Games</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem lancamentos">Lançamentos</li>
										</a>
										<a href="{{ route('singlegame') }}">
											<li class="submenuItem porgenero">Por Genêro</li>
										</a>
									</ul>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-6">
			</div>

			<div class="col-md-6">
				<div class="buscador">
					<div class="detalhes">
						<span class="buscandopor">Buscando por: <span class="buscandopor_value"></span></span>
						<span class="total">Total de <span class="total_value"></span> itens encontrados</span>
					</div>
					<ul class="resultados">
						<li class="resultado template">
							<div class="capa">
	                            <img class="capaGame" src="">
	                        </div>
							<div class="infos">
								<h3 class="titulo"></h3>
								<div class="sinopse"></div>
								<div class="generos">
									<div class="tag template">Template</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="no-results ativo">Nada encontrado!</div>
					<img src="{{ asset('images/loading.svg') }}" class="loading">
					<div class="paginas">
						<div class="paginacao">
							<div class="anterior">Anterior</div>
							<div class="espaco">|</div>
							<div class="numeros">
								<img src="{{ asset('images/loading.svg') }}" class="loadingPages">
								<div class="pagina template">1</div>
							</div>
							<div class="espaco">|</div>
							<div class="proximo">Próxima</div>
						</div>
						<div class="total">Página <span class="pagina">1</span> de <span class="total_pagina">1</span></div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>