<?php include 'partials/header.php'; ?>

<div class="container mt-5 pt-4 main">
    <?php
    // NOTE: Routing and menu generation can be done in a different automated way
    // using global array (router.php)
    // also could use URI and paths insted of GET variables 

    switch ($page) {
        case 'home':
            include 'views/home.php';
            break;
        case 'add_client':
            include 'views/add_client.php';
            break;
        case 'add_client_action';
            include 'actions/add_client.php';
            break;
        case 'clients':
            include 'views/clients.php';
            break;
        case 'contacts':
            include 'views/contacts.php';
            break;
        case 'employes':
            include 'views/employes.php';
            break;
        case 'packages':
            include 'views/packages.php';
            break;
        case '404':
        default:
            include 'views/404.php';
            break;
    }

    ?>
</div>

<?php include 'partials/footer.php'; ?>