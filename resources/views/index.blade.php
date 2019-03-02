@include('head')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<section id="splash">
    @include('components.carousel')
</section>

<section id="lancamentos">

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <h1 class="tituloSecao">Lançamentos de {{ strftime('%B') }} de {{ strftime('%Y') }}</h1>

                <ul class="games">
                    <li class="game">
                        <div class="data">
                            <span class="icon-calendar-o"></span>
                            <span class="dia">08</span>
                            <span class="semana">Sexta</span>
                        </div>
                        <div class="capa capaPC">
                            <img class="capaGame" src="{{ asset('images/capas/pc/farcry5.jpg') }}">
                        </div>
                        <div class="titulo">Far Cry 5</div>
                        <div class="tag genero1">Ação</div>
                        <div class="tag genero2">Aventura</div>
                        <div class="tag genero3">Shooter</div>
                    </li>
                    <li class="game">
                        <div class="data">
                            <span class="icon-calendar-o"></span>
                            <span class="dia">12</span>
                            <span class="semana">Terça</span>
                        </div>
                        <div class="capa capaPlaystation4">
                            <img class="capaGame" src="{{ asset('images/capas/playstation4/devilmaycryhdcollection.jpg') }}">
                        </div>
                        <div class="titulo">Devil May Cry HD Collection</div>
                        <div class="tag genero1">Ação</div>
                        <div class="tag genero2">Aventura</div>
                    </li>
                    <li class="game">
                        <div class="data">
                            <span class="icon-calendar-o"></span>
                            <span class="dia">20</span>
                            <span class="semana">Quarta</span>
                        </div>
                        <div class="capa capaPlaystation3">
                            <img class="capaGame" src="{{ asset('images/capas/playstation3/godofwarascension.jpg') }}">
                        </div>
                        <div class="titulo">God of War: Ascension</div>
                        <div class="tag genero1">Ação</div>
                    </li>
                    <li class="game">
                        <div class="data">
                            <span class="icon-calendar-o"></span>
                            <span class="dia">25</span>
                            <span class="semana">Domingo</span>
                        </div>
                        <div class="capa capaXbox">
                            <img class="capaGame" src="{{ asset('images/capas/xboxone/reddeadredemption2.jpg') }}">
                        </div>
                        <div class="titulo">Red Dead Redemption 2</div>
                        <div class="tag genero1">Ação</div>
                        <div class="tag genero2">Shooter</div>
                    </li>
                    <li class="game">
                        <div class="data">
                            <span class="icon-calendar-o"></span>
                            <span class="dia">28</span>
                            <span class="semana">Sabádo</span>
                        </div>
                        <div class="capa capaXbox">
                            <img class="capaGame" src="{{ asset('images/capas/xbox360/fifa19.jpg') }}">
                        </div>
                        <div class="titulo">Fifa 19</div>
                        <div class="tag genero1">Esporte</div>
                    </li>
                </ul>

            </div>

        </div>
    </div>

</section>

@include('footer')