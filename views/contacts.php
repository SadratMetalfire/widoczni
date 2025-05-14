<?php include_once 'includes/db.php'; ?>

<h2 class="mb-4">Lista wszystkich osób kontaktowych.</h2>

<?php
// TODO: Change file name and path to reflect exact purpose of this view

$sql = "SELECT 
    con.id,
    con.name,
    con.phone,
    con.email,
    c.name AS client_name
FROM contacts con
LEFT JOIN clients c ON con.client_id = c.id
ORDER BY c.name, con.name";

$stmt = $pdo->query($sql);
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($contacts): ?>
    <table class="table table-striped table-bordered table-hover sortable" id="contactsTable">
        <thead class="table-light">
            <tr>
                <th>Imię i nazwisko</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Klient</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['name']) ?></td>
                    <td><?= htmlspecialchars($contact['phone']) ?></td>
                    <td><?= htmlspecialchars($contact['email']) ?></td>
                    <td><?= htmlspecialchars($contact['client_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:  ?>
    <p class="text-center">Nie znalezion osób Kontaktowych</p>
<?php endif; ?>

<?php $pdo = null; ?>