<?php include_once 'includes/db.php'; ?>

<h2>Lista Pracowników</h2>

<?php
// TODO: Change file name and path to reflect exact purpose of this view

// get all employes for select
$stmt = $pdo->query("SELECT id, first_name, last_name FROM employes ORDER BY first_name, last_name");
$employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
$employe_id = $_GET['id'] ?? null;
?>

<form method="get" action="">
    <input type="hidden" name="page" value="employes">
    <label for="id">Pracownik:</label>
    <select name="id" id="id" required>
        <option value="">-- wybierz --</option>
        <?php foreach ($employes as $e): ?>
            <option value="<?= $e['id'] ?>" <?= ($employe_id == $e['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($e['first_name'] . ' ' . $e['last_name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Pokaż klientów</button>
</form>

<?php
if ($employe_id) {
    // get employe name to show (seprate from table query to shorten it)
    $stmt = $pdo->prepare("SELECT first_name, last_name FROM employes WHERE id = :id");
    $stmt->execute(['id' => $employe_id]);
    $employe = $stmt->fetch();

    if (!$employe) {
        echo "<p>Pracownik z ID $employe_id nie istnieje</p>";
        return;
    }

    $employe_name = htmlspecialchars($employe['first_name'] . ' ' . $employe['last_name']);

    echo "<p>Klienci przypisani do: <b>$employe_name</b></p>";

    // get data for the table
    $sql = " SELECT 
            c.id, 
            c.name, 
            c.nip, 
            c.address,
            c.notes,
            GROUP_CONCAT(DISTINCT p.name SEPARATOR ', ') AS packages,
            GROUP_CONCAT(DISTINCT con.name SEPARATOR ', ') AS contacts
        FROM client_employe ce
        JOIN clients c ON ce.client_id = c.id
        LEFT JOIN client_package cp ON c.id = cp.client_id
        LEFT JOIN packages p ON cp.package_id = p.id
        LEFT JOIN contacts con ON c.id = con.client_id
        WHERE ce.employe_id = :employe_id
        GROUP BY c.id
        ORDER BY c.name";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['employe_id' => $employe_id]);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($clients): ?>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>NIP</th>
                    <th>Adres</th>
                    <th>Notatki</th>
                    <th>Pakiety</th>
                    <th>Osoby kontaktowe</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nie znalezion przypisanych klientów</p>
<?php endif;
}
?>

<?php $pdo = null; ?>