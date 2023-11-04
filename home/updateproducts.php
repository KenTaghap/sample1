<?php
// Include the MongoDB PHP driver
require '../vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

use MongoDB\Client;

// MongoDB Atlas connection string
$connectionString = "mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/";

try {
    // Create a MongoDB client instance
    $client = new Client($connectionString);

    // Select the database and collection
    $database = $client->Joyicedb; // Replace with your database name
    $collection = $database->JIp; // Replace with your collection name

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get user input from the form
        $name = $_POST['Username'];


    $chocolatecart = $_POST['chocolate'];
    $milkcart = $_POST['milk'];
    $pineapplecart = $_POST['pineapple'];
    $sweetcorncart = $_POST['corn'];
    $watermeloncart = $_POST['watermelon'];

    


        // Define the filter to identify the document to update based on the username
        $filter = ['Username' => $name];

        // Define the update operation based on the user input
        $update = [
            '$set' => [
                'chocolatecart' => $chocolatecart,
                'milkcart' => $milkcart,
                'pineapplecart' => $pineapplecart,
                'sweetcorncart' => $sweetcorncart,
                'watermeloncart' => $watermeloncart,
                
            ],
        ];

        // Update data in the collection
        $result = $collection->updateOne($filter, $update);

        if ($result->getModifiedCount() > 0) {
            echo "Products Added!";
            
            
        } else {
            echo "Products not added";
        }
    } else {
        echo "Error";
        
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>
<div id="center_button"><button onclick="location.href='chocolate.html'">back</button></div>