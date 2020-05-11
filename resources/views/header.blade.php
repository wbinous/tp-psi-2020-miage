<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Gestion de l'enseignement</title>
        <meta name="description" content="Projet SI de L3 MIAGE Apprentissage">
        <meta name="author" content="Wassim Binous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <nav class="navbar is-info" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="mainNavBar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="mainNavBar" class="navbar-menu">
                <div class="navbar-start">
                    <a href="{{ route('index') }}" class="navbar-item">Gérer les individus</a>
                    <a href="{{ route('afficherGroupe') }}" class="navbar-item">Gérer les groupes</a>
                    <a href="{{ route('listeApi') }}" class="navbar-item">API</a>
                </div>
            </div>
        </nav>