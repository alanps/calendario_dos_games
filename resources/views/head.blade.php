<!DOCTYPE html>
<html id="page-{{$view_name}}">
<head>
    <title>Calendário dos Games</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
       
    <!-- visualização mobile ===================================================== -->
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="initial-scale = 1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" type="image/png" href="favicon.ico">
    <link rel="apple-touch-icon" href="resources/icons/icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="resources/icons/ios/AppIcon-72@1x.png">
    <link rel="apple-touch-icon" sizes="114x114" href="resources/icons/ios/AppIcon-57@2x.png">
    <link rel="apple-touch-icon" sizes="144x144" href="resources/icons/ios/AppIcon-72@2x.png">    


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/orator/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/verb/stylesheet.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <?php 
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    ?>

</head>
<body>

    <section id="topo">
        @include('components.menu')
    </section>