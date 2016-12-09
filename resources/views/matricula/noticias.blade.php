@extends('layouts.app4')
@section('content')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Dashboard para ingreso de data para matricula">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="img/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="img/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="$$hosted_libs_prefix$$/$$version$$/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="css/dash.css">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
<div/>
    <main class="mdl-layout mdl-color--grey-100">
        <div class="container panel panel-body">
        <h3>Nombre de la Noticia</h3>
        <div class="input-group form-group">
            <span class="input-group-addon" id="basic-addon1">Noticia</span>
            <input type="text" class="form-control" placeholder="Nombre de noticia" aria-describedby="basic-addon1">
        </div>
            <h3>Contenido de la noticia</h3>
            <div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1">Contenido</span>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
        </div>
    </main>
</div>
<script src="$$hosted_libs_prefix$$/$$version$$/material.min.js"></script>
</body>
</html>
@stop