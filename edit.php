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

    header("Location: wijzigingen.php");
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
<link rel="stylesheet" href="CSS/edit.css">
<body>
<!-- naam, plaatje, prijs, groep, allergie, gezond -->

<div class="toolbar">  
    <button id="btnHoofdpagina" onclick="location.href='Mees_Menu.php'">Hoofdpagina</button>
    <button id="btnAbout" onclick="location.href='Mees_Aboutus.html'">About Us</button>
    <button id="btnWijzigingen" onclick="location.href='wijzigingen.php'">Wijzigingen</button>
    <button id="btnLogin" onclick="location.href='inloggen.php'">Login</button>
     <button id="btnLogo" onclick="location.href='Mees_Menu.php'"></button>
</div>

<div class="form-container">
    <h2>Record aanpassen</h2>
<form method="post">
    <div class="input-container">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" value="<?= htmlspecialchars($data['naam']) ?>"><br><br>

        <label for="plaatje">Plaatje:</label>
        <input type="text" id="plaatje" name="plaatje" value="<?= htmlspecialchars($data['plaatje']) ?>"><br><br>

        <label for="prijs">Prijs:</label>
        <input type="text" id="prijs" name="prijs" value="<?= htmlspecialchars($data['prijs']) ?>"><br><br>

        <label for="groep">Groep:</label>
        <input type="text" id="groep" name="groep" value="<?= htmlspecialchars($data['groep']) ?>"><br><br>

        <label for="allergie">Allergie:</label>
        <input type="text" id="allergie" name="allergie" value="<?= htmlspecialchars($data['allergie']) ?>"><br><br>

        <label for="gezond">Gezond:</label>
        <input type="text" id="gezond" name="gezond" value="<?= htmlspecialchars($data['gezond']) ?>"><br><br>
    </div>
    <button type="submit" id="btnOpslaan">Opslaan</button>
</form>
</div>

</body>
</html>
