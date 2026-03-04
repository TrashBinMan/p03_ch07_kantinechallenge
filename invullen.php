<?php


require_once "db.php";

// =======================================
// FORM VERWERKING (STUREN NAAR DATABASE)
// =======================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $naam = $_POST['naam'] ?? '';
    $plaatje = $_POST['plaatje'] ?? '';
    $prijs = $_POST['prijs'] ?? '';
    $groep = $_POST['groep'] ?? '';
    $allergie = $_POST['allergie'] ?? '';
    $gezond = $_POST['gezond'] ?? '';

    if ($naam && $plaatje && $prijs && $groep && $allergie && $gezond) {

        $sql = "
            INSERT INTO tb_menu_kaart (naam, plaatje, prijs, groep, allergie, gezond)
            VALUES (:naam, :plaatje, :prijs, :groep, :allergie, :gezond)
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':naam' => $naam,
            ':plaatje' => $plaatje,
            ':prijs' => $prijs,
            ':groep' => $groep,
            ':allergie' => $allergie,
            ':gezond' => $gezond
        ]);

        $melding = "&#9989; Gegevens succesvol opgeslagen!";
    } else {
        $melding = "&#10060; Vul alle velden in.";
    }
}

// ============================
// FORM VERWERKING EINDE
// ============================

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>PDO Formulier Menukaart test.php</title>
    <link rel="stylesheet" href="CSS/invullen.css">
</head>
<body>

<div class="toolbar">  
    <button id="btnHoofdpagina" onclick="location.href='Mees_Menu.php'">Hoofdpagina</button>
    <button id="btnAbout" onclick="location.href='Mees_Aboutus.html'">About Us</button>
    <button id="btnWijzigingen" onclick="location.href='wijzigingen.php'">Wijzigingen</button>
    <button id="btnLogin" onclick="location.href='inloggen.php'">Login</button>
    <button id="btnLogo" onclick="location.href='Mees_Menu.php'"></button>
</div>


<h2>Invulformulier (PDO manier)</h2>

<?php if (!empty($melding)) echo "<p>$melding</p>"; ?>

<div class ="form-container">
    <h2>Invulformulier</h2>
<form method="post">
    <div class="input-container">
        <input type="text" name="naam" id="naam" placeholder="naam:" required>
    </div>

    <div class="input-container">
        <input type="text" name="plaatje" id="plaatje" placeholder="plaatje:" required>
    </div>

    <div class="input-container">
        <input type="text" name="prijs" id="prijs" placeholder="prijs:" required>
    </div>

    <div class="input-container">
        <input type="text" name="groep" id="groep" placeholder="groep:" required>
    </div>

    <div class="input-container">    
            <input type="text" name="allergie" id="allergie" placeholder="allergie:" required>
    </div>

    <div class="input-container">
            <input type="text" name="gezond" id="gezond" placeholder="gezond:" required>
    </div>

    <button type="submit" id="VerzendBtn">Verzenden</button>
</form>
</div>

</body>
</html>
