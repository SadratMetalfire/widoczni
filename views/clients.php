<?php include_once 'includes/db.php'; ?>

<h2 class="mb-4">Lista klientów wraz z przypisanymi pakietami, osobami kontaktowymi i opiekunami.</h2>

<?php
// TODO: Change file name and path to reflect exact purpose of this view

$sql = "SELECT 
    c.id, 
    c.name, 
    c.nip, 
    c.address,
    c.notes,
    GROUP_CONCAT(DISTINCT p.name SEPARATOR ', ') AS packages,
    GROUP_CONCAT(DISTINCT con.name SEPARATOR ', ') AS contacts,
    GROUP_CONCAT(DISTINCT CONCAT(e.first_name, ' ', e.last_name) SEPARATOR ', ') AS employees
FROM clients c
LEFT JOIN client_package cp ON c.id = cp.client_id
LEFT JOIN packages p ON cp.package_id = p.id
LEFT JOIN contacts con ON c.id = con.client_id
LEFT JOIN client_employe ce ON c.id = ce.client_id
LEFT JOIN employes e ON ce.employe_id = e.id
GROUP BY c.id
ORDER BY c.name;";

$stmt = $pdo->query($sql);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// NOTE: Could add <a> tags to packages/contacts/employes for easier searching by or just search fields on all pages
?>

<?php if ($clients): ?>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nazwa Klienta</th>
                <th>NIP</th>
                <th>Adres</th>
                <th>Notatki</th>
                <th>Pakiety</th>
                <th>Osoby Kontaktowe</th>
                <th>Opiekunowie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['name']) ?></td>
                    <td><?= htmlspecialchars($client['nip']) ?></td>
                    <td><?= htmlspecialchars($client['address']) ?></td>
                    <td><?= htmlspecialchars($client['notes']) ?></td>
                    <td><?= htmlspecialchars($client['packages']) ?></td>
                    <td><?= htmlspecialchars($client['contacts']) ?></td>
                    <td><?= htmlspecialchars($client['employees']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:  ?>
    <p class="text-center">Nie znalezion klientów</p>
<?php endif; ?>

<?php $pdo = null; ?>