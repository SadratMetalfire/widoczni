<?php include_once 'includes/db.php'; ?>

<h2>Lista Pakietów</h2>

<?php
$sql = "SELECT id, name, price, currency, description FROM packages ORDER BY name";

$stmt = $pdo->query($sql);
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($packages): ?>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Waluta</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packages as $package): ?>
                <tr>
                    <td><?= htmlspecialchars($package['name']) ?></td>
                    <td><?= htmlspecialchars($package['price']) ?></td>
                    <td><?= htmlspecialchars($package['currency']) ?></td>
                    <td><?= htmlspecialchars($package['description']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:  ?>
    <p>Nie znalezion pakietów</p>
<?php endif; ?>

<?php $pdo = null; ?>