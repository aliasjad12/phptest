<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ali"; 
$port=3307;


$conn = new mysqli($servername, $username, $password, $dbname,$port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password=$_POST['password'];

    
    $sql = "INSERT INTO user (name, email) VALUES ('$name', '$email','$password)";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
