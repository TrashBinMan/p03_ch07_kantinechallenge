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
    <link rel="stylesheet" href="CSS/wijzigingen.css">
</head>
<body> 

<div class="toolbar">  
    <button id="btnHoofdpagina" onclick="location.href='Mees_menu.php'">Hoofdpagina</button>
    <button id="btnAbout" onclick="location.href='Mees_Aboutus.html'">About Us</button>
    <button id="btnWijzigingen" onclick="location.href='wijzigingen.php'">Wijzigingen</button>
    <button id="btnLogin" onclick="location.href='inloggen.php'">Login</button>
    <button id="btnLogo" onclick="location.href='Mees_Home.html'"></button>
</div>


<h2>Gegevens overzicht</h2>

<div class="form-container">
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
                    <div class="action-links">
                    <a href="edit.php?id=<?= $row['ID'] ?>"
                       id="action-links-edit">Edit
                       </a>

                    <a href="delete.php?id=<?= $row['ID'] ?>"
                        id="action-links-delete"
                        onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                        Delete
                    </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="invullen.php">
<button id="btnNieuwRecord"> Maak nieuw record aan</button>
</a>
</div>

</body>
</html>