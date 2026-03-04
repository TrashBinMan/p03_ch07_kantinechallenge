<?php
// ===================================
// PDO DATABASE CONNECTIE (standaard)
// ===================================
$host = 'localhost';
$dbname = 'db_c07';
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
    //echo "&#9989; Database is goed verbonden"; // Is eigenlijk overbodig... 
} catch (PDOException $e) {
    die("&#10060; Databasefout! <br>" . $e->getMessage());
}

// =========================================
// Einde PDO DATABASE CONNECTIE (standaard)
// =========================================

// ==========================
// Data ophalen uit database
// ==========================

$stmt = $pdo->query("SELECT * FROM tb_menu_kaart");
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

<div class="toolbar">  
    <a href="mees_menu.php">
      <button>
      Hoofdpagina
    </button></a>

    <a href="over_ons.html">
      <button>
      Over Ons
    </button></a>

    <a href="invullen.php">
      <button>
      Invullen
    </button></a>

    <a href="inloggen.php">
      <button>
      Login
    </button></a>
</div>


<h2>Gegevens overzicht</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Plaatje</th>
            <th>Prijs</th>
            <th>Groep</th>
            <th>Allergie</th>
            <th>Gezond</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['ID']) ?></td>
            <td><?= htmlspecialchars($row['naam']) ?></td>
            <td><?= htmlspecialchars($row['plaatje']) ?></td>
            <td><?= htmlspecialchars($row['prijs']) ?></td>
            <td><?= htmlspecialchars($row['groep']) ?></td>
            <td><?= htmlspecialchars($row['allergie']) ?></td>
            <td><?= htmlspecialchars($row['gezond']) ?></td>
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
<br><br>
<a href="EDITDASHBOARD.php">
<button>Maak nieuw record aan</button>
</a>

</body>
</html>