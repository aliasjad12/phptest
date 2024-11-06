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


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "DELETE FROM user WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
        header("Location: view.php"); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
