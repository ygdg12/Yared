<?php

include("index1.php");

$firstname = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat-password'];

// Check if password and repeat password match
if ($password !== $repeatPassword) {
    die("Passwords do not match.");
}

// Hash the password before saving
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare an SQL statement to prevent SQL injection
$sql = "INSERT INTO users (Username, Email, Passoword) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $firstname, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    echo "User successfully registered!";
    header("location:home.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
 