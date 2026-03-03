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
    // echo "&#9989; Database is goed verbonden"; // Is eigenlijk overbodig... 
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
    $sql = "UPDATE tb_menu_kaart
            SET naam = :naam, plaatje = :plaatje, prijs = :prijs, groep = :groep, allergie = :allergie, gezond = :gezond
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':naam' => $_POST['naam'],
        ':plaatje' => $_POST['plaatje'],
        ':prijs' => $_POST['prijs'],
        ':groep' => $_POST['groep'],
        ':allergie' => $_POST['allergie'],
        ':gezond' => $_POST['gezond'],
        ':id' => $id
    ]);

    header("Location: overzicht.php");
    exit;
}

// Data ophalen
$stmt = $pdo->prepare("SELECT * FROM tb_menu_kaart WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Edit</title></head>
<body>
<!-- naam, plaatje, prijs, groep, allergie, gezond -->
<h2>Record aanpassen</h2>

<form method="post">
    Naam:<br>
    <input type="text" name="naam" value="<?= htmlspecialchars($data['naam']) ?>"><br><br>

    Plaatje:<br>
    <input type="text" name="plaatje" value="<?= htmlspecialchars($data['plaatje']) ?>"><br><br>

    Prijs:<br>
    <input type="text" name="prijs" value="<?= htmlspecialchars($data['prijs']) ?>"><br><br>

    Groep:<br>
    <input type="text" name="groep" value="<?= htmlspecialchars($data['groep']) ?>"><br><br>

    Allergie:<br>
    <input type="text" name="allergie" value="<?= htmlspecialchars($data['allergie']) ?>"><br><br>

    Gezond:<br>
    <input type="text" name="gezond" value="<?= htmlspecialchars($data['gezond']) ?>"><br><br>

    <button type="submit">Opslaan</button>
</form>

</body>
</html>
