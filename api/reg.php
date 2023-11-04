<?php
// Include the MongoDB PHP driver
require 'vendor/autoload.php';

use MongoDB\Client;

// Replace with your MongoDB Atlas connection string
$connectionString = "mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/";

// Create a new MongoDB client
$client = new Client($connectionString);

// Select the MongoDB database and collection
$database = $client->selectDatabase("Joyicedb");
$collection = $database->selectCollection("JIp");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $cnumber = $_POST["cnumber"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Create a new document to insert into the collection
    $document = [
        "fname" => $fname,
        "lname" => $lname,
        "age" => $age,
        "address" => $address,
        "cnumber" => $cnumber,
        "email" => $email,
        "username" => $username,
        "password" => $password,


        "chocolatestick" => 0,
        "chololateprice" => 0,
        "milkprice" => 0,
        "milkstick" => 0,
        "pineappleprice" => 0,
        "pineapplestick" => 0,
        "sweetcornprice" => 0,
        "sweetcornstick" => 0,


         "watermelonprice" => 0,
        "watermelonstick" => 0,
        "chocolatecart" => 0,
        "milkcart" => 0,
        "pineapplecart" => 0,
        "sweetcorncart" => 0,
        "watermeloncart" => 0,
        "chocolateprice" => 0,



        
    ];

    // Insert the document into the collection
    $collection->insertOne($document);

    // Redirect back to the form with a success message
    echo "Registration successful!";
} else {
    // Redirect back to the form with an error message
    echo "Invalid username or password";
}
?>
<div id="center_button"><button onclick="location.href='../index.html'">Back to Home</button></div>
