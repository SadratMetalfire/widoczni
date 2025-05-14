<?php include_once 'includes/db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $nip = trim($_POST['nip'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $notes = trim($_POST['notes'] ?? '');

    // TODO: Add more validation mainly for data types and length
    if ($name === '' || $nip === '') {
        echo '<div class="alert alert-danger">Uzupełnij wymagane pola</div>';
        return;
    }

    $stmt = $pdo->prepare("
        INSERT INTO clients (name, nip, address, notes)
        VALUES (:name, :nip, :address, :notes)
    ");
    $stmt->execute([
        'name' => $name,
        'nip' => $nip,
        'address' => $address,
        'notes' => $notes,
    ]);

    echo '<div class="container mt-4"><div class="alert alert-success">Dodano klienta: <b>' . htmlspecialchars($name) . '</b>.</div></div>';
    echo '<div class="container"><a href="?page=add_client" class="btn btn-primary">Dodaj kolejnego</a> <a href="?page=clients" class="btn btn-primary">Lista klientów</a></div>';
} else {
    echo '<div class="container mt-4"><div class="alert alert-danger">Nie udało się dodać klienta</div></div>';
}
