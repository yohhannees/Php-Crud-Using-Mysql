<?php
require_once 'db.php';

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['age'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users (first_name, last_name, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $first_name, $last_name, $age);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

header("location: index.php");
