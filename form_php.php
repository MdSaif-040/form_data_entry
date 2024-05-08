<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Database connection
$conn = new mysqli('localhost', 'root@localhost', '', 'test2.0');

if ($conn->mysqli_connect_error()) {
    echo "Connection Failed: " . $conn->mysqli_connect_error();
    die(); // Terminate script execution on error
} else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
