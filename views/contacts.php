<?php include_once 'includes/db.php'; ?>

<h2>Lista Osób Kontaktowych</h2>

<?php
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
    <table class="table" border="1">
        <thead>
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
    <p>Nie znalezion osób Kontaktowych</p>
<?php endif; ?>

<?php $pdo = null; ?>