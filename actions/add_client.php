<?php include_once 'includes/db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $nip = trim($_POST['nip'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $notes = trim($_POST['notes'] ?? '');

    // TODO: Add more validation mainly for data types and length
    if ($name === '' || $nip === '') {
        echo "<p>Uzupełnij wymagane pola</p>";
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

    echo "<p>Dodano klienta: <b>" . htmlspecialchars($name) . "</b>.</p>";
    echo "<p><a href='?page=add_client'>Dodaj kolejnego klienta</a> | <a href='?page=clients'>Lista klientów</a></p>";
} else {
    echo "<p style='color:red;'>Nieprawidłowe żądanie.</p>";
}
