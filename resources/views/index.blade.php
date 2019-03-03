@include('head')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/moment-with-locales.js') }}"></script>
<script src="{{ asset('js/lancamentos.js') }}"></script>

<section id="splash">
    @include('components.carousel')
</section>

<section id="lancamentos" class="loading">

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <h1 class="tituloSecao">Próximos Lançamentos</h1>

                <ul class="games">
                    <li class="game template">
                        <div class="data">
                            <span class="icon-calendar-o"></span>
                            <span class="dia"></span>
                            <span class="mes"></span>
                            <span class="ano"></span>
                        </div>
                        <div class="capa">
                            <img class="capaGame" src="">
                        </div>
                        <div class="titulo"></div>
                        <div class="tag template"></div>
                    </li>
                </ul>

                <img src="{{ asset('images/loading.svg') }}" class="loading">

            </div>

        </div>
    </div>

</section>

@include('footer')