<?php
session_start();
require "database/connection.php";

// check of ingelogd
if (!isset($_SESSION['id'])) {
    echo "Je bent niet ingelogd";
    exit;
}

// gebruiker ophalen
$stmt = $conn->prepare("SELECT email FROM account WHERE id = :id");
$stmt->bindParam(":id", $_SESSION['id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Profiel</h1>
<p>Email: <?= htmlspecialchars($user['email']); ?></p>