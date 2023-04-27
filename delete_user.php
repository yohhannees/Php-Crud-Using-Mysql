<?php
require_once 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM names WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("location: index.php");
