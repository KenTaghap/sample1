<?php
// Include the MongoDB PHP driver
require '../api/vendor/autoload.php';

use MongoDB\Client;

// Replace with your MongoDB Atlas connection string
$connectionString = "mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/";

// Create a new MongoDB client
$client = new Client($connectionString);

// Select the MongoDB database and collection
$database = $client->selectDatabase("Joyicedb");
$collection = $database->selectCollection("review");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
$username = $_POST['username'];
$date = $_POST['date'];
$report = $_POST['report'];
$message = $_POST['message'];

$chocolatestick = $_POST['chocolatestick'];
$milkstick = $_POST['milkstick'];
$pineapplestick = $_POST['pineapplestick'];
$sweetcornstick = $_POST['sweetcornstick'];
$watermelonstick = $_POST['watermelonstick'];

    // Create a new document to insert into the collection
    $document = [
        "report" => $report,
        "message" => $message,
		
        "chocolatestick" => $chocolatestick,
        "milkstick" => $milkstick,
        "pineapplestick" => $pineapplestick,
        "sweetcornstick" => $sweetcornstick,
        "watermelonstick" => $watermelonstick,
		
        "username" => $username,
		"date" => $date,
    ];

    // Insert the document into the collection
    $collection->insertOne($document);

    // Redirect back to the form with a success message
    echo "imnformation saved successfully";
} else {
    // Redirect back to the form with an error message
    echo "Invalid information";
}
?>
<div id="center_button"><button onclick="location.href='contact.html'">back</button></div>



