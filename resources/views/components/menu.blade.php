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
					<a href="{{ route('index') }}" class="menuItemInicial">
						<li class="menuItem">Página Inicial</li>
					</a>
					<a href="#" class="ativarSubmenu" class="menuItemLancamentos">
						<li class="menuItem">Games</li>
					</a>
					<a href="{{ route('sobre') }}" class="menuItemSobre">
						<li class="menuItem">Sobre</li>
					</a>
				</ul>
			</div>

			<div class="col-md-4">
				<div class="busca">
					<label for="inputBusca">Buscar:</label>
					<input name="inputBusca" id="inputBusca" type="text" autocomplete="off" placeholder="digite o nome do jogo">
					<span class="icon-search"></span>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="background"></div>

				<div class="submenu" style="display: none;">
			
					<div class="linha linha1">
						<div class="titulo">Categorias</div>
						<ul class="submenuItens">
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem acao">ação</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem aventura">aventura</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem corrida">corrida</li>
							</a>
						</ul>
					</div>

					<div class="linha linha2">
						<ul class="submenuItens">
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem esporte">esporte</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem estrategia">estratégia</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem fitness">fitness</li>
							</a>
						</ul>
					</div>

					<div class="linha linha3">
						<ul class="submenuItens">
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem luta">luta</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem rpg">rpg</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem mmo">mmo</li>
							</a>
						</ul>
					</div>

					<div class="linha linha4">
						<ul class="submenuItens">
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem simulacao">simulação</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem shooter">shooter</li>
							</a>
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem terror">terror</li>
							</a>
						</ul>
					</div>

					<div class="linha linha5">
						<ul class="submenuItens">
							<a href="{{ route('singlegame') }}">
								<li class="submenuItem vertodos">ver todos</li>
							</a>
						</ul>
					</div>

					<div class="linha linha6">
						<div class="titulo">Destaques</div>
						<ul class="submenuDestaquesItens">
							<a href="{{ route('singlegame') }}" class="submenuDestaqueItem template">
								<li class="capa">
		                            <img class="capaGame" src="">
		                        </li>
							</a>
						</ul>
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
						<span class="buscandopor">
							<span class="texto">Buscando por: </span>
							<img src="{{ asset('images/loading.svg') }}" class="loading">
							<span class="buscandopor_value"></span>
						</span>
						<span class="total">
							<span class="texto">Total de </span>
							<img src="{{ asset('images/loading.svg') }}" class="loading">
							<span class="total_value"></span> 
							<span class="texto">itens encontrados</span>
						</span>
					</div>
					<ul class="resultados">
						<a class="resultado template">
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
						</a>
					</ul>
					<div class="no-results ativo">Nada encontrado!</div>
					<img src="{{ asset('images/loading.svg') }}" class="loadingCentral">
					<div class="paginas">
						<div class="paginacao">
							<div class="anterior">Anterior</div>
							<div class="espaco">|</div>
							<div class="numeros">
								<img src="{{ asset('images/loading.svg') }}" class="loading">
								<div class="pagina template">1</div>
							</div>
							<div class="espaco">|</div>
							<div class="proximo">Próxima</div>
						</div>
						<div class="total">
							<span class="texto">Página </span>
							<img src="{{ asset('images/loading.svg') }}" class="loading">
							<span class="pagina">1</span>
							<span class="texto"> de </span>
							<img src="{{ asset('images/loading.svg') }}" class="loading">
							<span class="total_pagina">1</span>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>