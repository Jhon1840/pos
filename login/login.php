<?php

$servername = "localhost"; 
$username = "usuario"; 
$password = "contraseña"; 
$database = "pos";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    $sql = "SELECT id FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: inicio.html"); 
    } else {
        
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

$conn->close();
?>
