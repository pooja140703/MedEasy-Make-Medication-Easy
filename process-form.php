<?php

$name = $_POST["name"];
$mail = $_POST["mail"];  // Corrected variable
$number = $_POST["number"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$host = "localhost";
$dbname = "patient-info";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO info (name, mail, number, subject, message)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

// Correct the binding and remove the extra comma
mysqli_stmt_bind_param($stmt, "ssiss", $name, $mail, $number, $subject, $message);

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>
