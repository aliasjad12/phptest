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

  
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "Record not found.";
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password=$_POST['password'];

    
    $sql = "UPDATE user SET name = '$name', email = '$email', password='$password' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>" required>

    <input type="submit" value="Update">
</form>
