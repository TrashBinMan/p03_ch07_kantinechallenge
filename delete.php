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
if (!$id) die("Geen ID opgegeven");

$stmt = $pdo->prepare("DELETE FROM tb_menu_kaart WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: wijzigingen.php"); // Stuur mij terug naar overzicht.php
exit;
