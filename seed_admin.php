<?php
// seed_admin.php
// Run dit 1x in je browser om admin/admin correct in de database te zetten.

require_once "db.php";

$username = "admin";
$password = "admin";

// Maak een verse hash (bcrypt)
$hash = password_hash($password, PASSWORD_DEFAULT);

// Upsert: bestaat admin al? dan update hash, anders insert
$sql = "
INSERT INTO tb_login (username, password_hash)
VALUES (:username, :hash)
ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
  ":username" => $username,
  ":hash" => $hash
]);

echo "✅ Admin user aangemaakt/geüpdatet.<br>";
echo "Username: admin<br>";
echo "Password: admin<br>";
echo "Hash: " . htmlspecialchars($hash);