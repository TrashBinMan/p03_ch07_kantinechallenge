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
            INSERT INTO tb_menukaart_NL (naam, plaatje, prijs, groep, allergie, gezond)
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
</head>
<body>

<h2>Invulformulier (PDO manier)</h2>

<?php if (!empty($melding)) echo "<p>$melding</p>"; ?>

<form method="post">
    <label>
        Naam:<br>
        <input type="text" name="naam" required>
    </label><br><br>

    <label>
        plaatje:<br>
        <input type="text" name="plaatje" required>
    </label><br><br>

    <label>
        prijs:<br>
        <input type="text" name="prijs" required>
    </label><br><br>
    
    <label>
        groep:<br>
        <input type="text" name="groep" required>
    </label><br><br>
    
    <label>
        allergie:<br>
        <input type="text" name="allergie" required>
    </label><br><br>
    
     <label>
        gezond:<br>
        <input type="text" name="gezond" required>
    </label><br><br>

    <button type="submit">Verzenden</button>
</form>

</body>
</html>
