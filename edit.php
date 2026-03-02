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

$id = $_GET['id'] ?? null;
if (!$id) die("<br>&#10060; Geen ID opgegeven");

// Opslaan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE testtabel
            SET naam = :naam, achternaam = :achternaam, telefoonnummer = :telefoonnummer
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':naam' => $_POST['naam'],
        ':achternaam' => $_POST['achternaam'],
        ':telefoonnummer' => $_POST['telefoonnummer'],
        ':id' => $id
    ]);

    header("Location: overzicht.php");
    exit;
}

// Data ophalen
$stmt = $pdo->prepare("SELECT * FROM testtabel WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Edit</title></head>
<body>

<h2>Record aanpassen</h2>

<form method="post">
    Naam:<br>
    <input type="text" name="naam" value="<?= htmlspecialchars($data['naam']) ?>"><br><br>

    Achternaam:<br>
    <input type="text" name="achternaam" value="<?= htmlspecialchars($data['achternaam']) ?>"><br><br>

    Telefoonnummer:<br>
    <input type="text" name="telefoonnummer" value="<?= htmlspecialchars($data['telefoonnummer']) ?>"><br><br>

    <button type="submit">Opslaan</button>
</form>

</body>
</html>
