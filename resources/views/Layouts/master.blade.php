<!doctype html>
<html lang="fr">

<head>
    <title>GSB Frais</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/assets/css/GSB.css') }}"/>
    <link rel="stylesheet" href="{{ url('/assets/icons/bootstrap-icons.css') }}"/>


</head>

<body class="body">
<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">GSBfrais</a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if(session('id_visiteur'))
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/listerFrais') }}">Lister</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ajouterFrais') }}">Ajouter</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/deconnexion') }}">({{ session('visiteur') }}) Se déconnecter</a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/connecter') }}">Se connecter</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </nav>

</div>
<div class="container">
@yield("content")
</div>


</body>

</html>
