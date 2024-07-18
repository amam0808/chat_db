<?php

session_start();
include "sql_connection.php";

$message = $_POST["message"];
$users_id = $_SESSION["id"];

$stmt = $conn->prepare("INSERT INTO messages (message, users_id) VALUES (:message, :users_id)");
$stmt->bindParam(':message', $message);
$stmt->bindParam(':users_id', $users_id);
$stmt->execute();

header("Location: index.php");
exit;
?>