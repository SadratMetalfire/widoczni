<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widoczni</title>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <header>
        Header/Menu

        <?php
        // check current page here to mark active in menu
        $page = isset($_GET['page']) ? $_GET['page'] : 'clients';
        ?>

        <nav>
            <ul>
                <li><a href="?page=clients" class="<?= ($page =='clients' ? 'active' : '') ?>">Klienci</a></li>
            </ul>
            <ul>
                <li><a href="?page=contacts" class="<?= ($page == 'contacts' ? 'active' : '') ?>">Kontakty</a></li>
            </ul>
            <ul>
                <li><a href="?page=employes" class="<?= ($page == 'employes' ? 'active' : '') ?>">Pracownicy</a></li>
            </ul>
            <ul>
                <li><a href="?page=packages" class="<?= ($page == 'packages' ? 'active' : '') ?>">Pakiety</a></li>
            </ul>
            <ul>
                <li><a href="?page=add_client" class="<?= ($page == 'add_client' ? 'active' : '') ?>">Dodaj klienta</a></li>
            </ul>
        </nav>
    </header>