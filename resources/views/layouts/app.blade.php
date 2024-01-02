<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>

<style>
    /* Ajoutez ces styles pour le navbar transparent */
    .navbar {
        background-color: transparent !important;
        color: white;
        backdrop-filter: blur(10px); /* Ajoutez cet effet de flou pour un look transparent */
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: white !important; /* Couleur du texte en blanc */
    }

    .navbar-toggler-icon {
        background-color: white; /* Couleur du bouton de menu en blanc */
    }

    .navbar-toggler {
        border-color: white; /* Couleur de la bordure du bouton de menu en blanc */
    }

    .navbar-toggler:hover {
        background-color: #ffffff; /* Couleur de fond du bouton de menu en blanc au survol */
    }

    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
        transform: scale(1.1); /* Agrandir légèrement au survol */
        transition: transform 0.3s ease-in-out; /* Ajouter une transition fluide */
    }

    /* Ajoutez ces styles pour les boutons à l'intérieur du navbar */
    .navbar .btn-primary,
    .navbar .btn-light {
        background-color: #ffffff; /* Couleur de fond blanche */
        color: #007bff; /* Couleur du texte bleu */
        border-color: #ffffff; /* Couleur de la bordure blanche */
        margin-right: 10px; /* Ajoutez un espace entre les boutons */
    }

    .navbar .btn-primary:hover,
    .navbar .btn-light:hover {
        background-color: #007bff; /* Couleur de fond bleue au survol */
        color: #ffffff; /* Couleur du texte blanc au survol */
        border-color: #007bff; /* Couleur de la bordure bleue au survol */
    }

    /* Ajoutez ces styles pour les boutons "Complete" et "Delete" dans le navbar */
    .navbar .complete-btn,
    .navbar .delete-btn {
        width: 48%; /* Répartir les boutons horizontalement avec un petit espace entre eux */
        margin-right: 4%; /* Ajouter un petit espace entre les boutons */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand ms-2" href="/">Just Do It</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item  me-2">
                    <a class="nav-link" href="/">All Tasks</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/tasks/create">New Task</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Ajoute le script Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>
