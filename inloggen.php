<?php
// login.php
// Deze pagina toont het loginformulier én verwerkt de login.
// Als de login klopt -> doorsturen naar dashboard.php

session_start();          // Nodig om later in te loggen via session
require_once "db.php";    // PDO verbinding

$error = "";

// Als er op de knop "Inloggen" is gedrukt, komt er een POST-request binnen
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 1) Lees de input uit het formulier
    // trim() haalt spaties weg aan begin/eind
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    // 2) Basis validatie (is er iets ingevuld?)
    if ($username === "" || $password === "") {
        $error = "Vul een gebruikersnaam én wachtwoord in.";
    } else {

        // 3) Haal de gebruiker op uit de database met een prepared statement
        // Zo voorkom je SQL-injectie.
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM tb_login WHERE username = :username LIMIT 1");
        $stmt->execute([":username" => $username]);

        $user = $stmt->fetch(); // false als niets gevonden
		
		// HOTFIX als wachtwoord niet klopt... dumpt Array!
		// var_dump($user); 
		// exit;
        
        
        // 4) Controleer:
        // - bestaat de user?
        // - klopt het wachtwoord met password_verify?
        if ($user && password_verify($password, $user["password_hash"])) {

            // 5) Login is gelukt -> zet sessievariabelen
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            // 6) Doorsturen naar dashboard
            header("Location: invullen.php");
            exit;

        } else {
            $error = "Onjuiste gebruikersnaam of wachtwoord.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
  <div class="card">
    <h1>Login</h1>

    <form method="POST" action="inloggen.php">
      <label for="username">Gebruikersnaam</label>
      <input id="username" name="username" type="text" placeholder="bijv. admin" required>

      <label for="password">Wachtwoord</label>
      <input id="password" name="password" type="password" placeholder="bijv. admin" required>

      <button type="submit">Inloggen</button>
    </form>

    <?php if ($error): ?>
      <div class="msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
  </div>

</body>
</html>