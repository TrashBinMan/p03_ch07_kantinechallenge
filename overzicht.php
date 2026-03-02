<?php
// ===================================
// PDO DATABASE CONNECTIE (standaard)
// ===================================
$host = 'localhost';
$dbname = 'testdatabase';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    echo "&#9989; Database is goed verbonden"; // Is eigenlijk overbodig... 
} catch (PDOException $e) {
    die("&#10060; Databasefout! <br>" . $e->getMessage());
}

// =========================================
// Einde PDO DATABASE CONNECTIE (standaard)
// =========================================

// ==========================
// Data ophalen uit database
// ==========================

$stmt = $pdo->query("SELECT * FROM testtabel");
$records = $stmt->fetchAll();

// ================================
// Einde data uit database ophalen
// ================================

?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht</title>
    <style>
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f2f2f2; }
        a { text-decoration: none; margin-right: 8px; }
    </style>
</head>
<body> 

<h2>Gegevens overzicht</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Achternaam</th>
            <th>Telefoonnummer</th>
            <th>Email</th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['ID']) ?></td>
            <td><?= htmlspecialchars($row['naam']) ?></td>
            <td><?= htmlspecialchars($row['achternaam']) ?></td>
            <td><?= htmlspecialchars($row['telefoonnummer']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['ID'] ?>">✏️ Edit</a>
                <a href="delete.php?id=<?= $row['ID'] ?>"
                   onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                   🗑️ Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="invullen.php">
<button>Maak nieuw record aan</button>
</a>

</body>
</html>

