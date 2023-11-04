<?php
require 'vendor/autoload.php';

// Connect to MongoDB Atlas
$mongoClient = new MongoDB\Client("mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/");

// Select the database and collection
$database = $mongoClient->Joyicedb;
$collection = $database->JIp;

$errorMsg = ""; // Initialize an error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["Username"];
    $Password = $_POST["pass"];

    // Query for the user
    $query = ["username" => $Username, "password" => $Password];
    $user = $collection->findOne($query);

    if ($user) {
        // Successful login, set session variables or redirect to a protected area
    header("Location: ../home/index.html");

    } else {
         // Invalid login
    echo "Invalid username or password.";
    }
}
?>

