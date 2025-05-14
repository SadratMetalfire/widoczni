<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <header>
        <?php
        // check current page here to mark active in menu and default to home if ?page=''
        $page = $_GET['page'] ?? 'home';
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="?page=home">CRM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link <?= ($page == 'clients' ? 'active' : '') ?>" href="?page=clients">Klienci</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page == 'contacts' ? 'active' : '') ?>" href="?page=contacts">Osoby kontaktowe</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page == 'employes' ? 'active' : '') ?>" href="?page=employes">Pracownicy</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page == 'packages' ? 'active' : '') ?>" href="?page=packages">Pakiety</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($page == 'add_client' ? 'active' : '') ?>" href="?page=add_client">Dodaj klienta</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>