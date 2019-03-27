<?php
//phpinfo();
$servername = "localhost";
$username = "xxx";
$password = "xxx";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed with mysqli: " . $conn->connect_error);
}
echo "<p>Connected successfully with mysqli</p>" . PHP_EOL;
$conn->close();

try {
    $conn = new PDO("mysql:host=$servername;dbname=xxx", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>Connected successfully with pdo</p>" . PHP_EOL;
} catch (PDOException $e) {
    echo "<p>Connection failed with pdo: " . $e->getMessage() . '</p>' . PHP_EOL;
}
$conn = null;
