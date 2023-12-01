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


        "chocolatestick" => "none",
        "chololateprice" => "none",
        "milkprice" => "none",
        "milkstick" =>"none",
        "pineappleprice" => "none",
        "pineapplestick" => "none",
        "sweetcornprice" => "none",
        "sweetcornstick" => "none",


         "watermelonprice" => "none",
        "watermelonstick" => "none",
        "chocolatecart" => "none",
        "milkcart" => "none",
        "pineapplecart" => "none",
        "sweetcorncart" => "none",
        "watermeloncart" => "none",
        "chocolateprice" => "none",



        
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
