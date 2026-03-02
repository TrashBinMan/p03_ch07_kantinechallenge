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