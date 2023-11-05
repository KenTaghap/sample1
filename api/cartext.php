<?php
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

use MongoDB\Client;

// Replace with your MongoDB Atlas connection string
$connectionString = "mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/Joyicedb";

try {
    $client = new Client($connectionString);
    $collection = $client->Joyicedb->JIp; // Replace with your database and collection names

    if (isset($_POST['Username'])) {
        $Username = $_POST['Username'];
        $filter = ['username' => $Username];
        $userInfo = $collection->findOne($filter);

        // Continue with the rest of your code
        $chocolatecart = $userInfo['chocolatecart'];
        $milkcart = $userInfo['milkcart'];
        $pineapplecart = $userInfo['pineapplecart'];
        $sweetcorncart = $userInfo['sweetcorncart'];
        $watermeloncart = $userInfo['watermeloncart'];


    } else {
        // Handle the case where "Username" is not set in the POST request
        // You can display an error message or take appropriate action.
        $chocolatecart = "";
        $milkcart = "";
        $pineapplecart = "";
        $sweetcorncart = "";
        $watermeloncart = "";

    }

    if (isset($_POST['display'])) {
        // Handle the "Display" button click
        // You can keep your existing display logic here
    } elseif (isset($_POST['update'])) {
        // Handle the "Update" button click
        $Username = $_POST['Username'];
         // Continue with the rest of your code
         $chocolatecart = $_POST['inputNumber1'];
         $milkcart = $_POST['inputNumber2'];
         $pineapplecart = $_POST['inputNumber3'];
         $sweetcorncart = $_POST['inputNumber4'];
         $watermeloncart = $_POST['inputNumber5'];

         $chocolatep = $_POST['result1'];
         $milkp = $_POST['result2'];
         $pineapplep = $_POST['result3'];
         $sweetcornp = $_POST['result4'];
         $watermelonp = $_POST['result5'];
        // Create an update filter based on the username
        $filter = ['username' => $Username];

        // Create an update document with the new values
        $updateDocument = [
            '$set' => [
                'chocolatestick' => $chocolatep,
                'milkstick' => $milkp,
                'pineapplestick' => $pineapplep,
                'sweetcornstick' => $sweetcornp,
                'watermelonstick' => $watermelonp,
                'chocolateprice' => $chocolatecart,
                'milkprice' => $milkcart,
                'pineappleprice' => $pineapplecart,
                'sweetcornprice' => $sweetcorncart,
                'watermelonprice' => $watermeloncart
            ]
        ];

        // Perform the update in the MongoDB database
        $result = $collection->updateOne($filter, $updateDocument);

        if ($result->getModifiedCount() > 0) {
            // The update was successful
            echo "Thank you for purchasing!";
        } else {
            // The update did not modify any documents (username not found)
            echo "Something error, cannot buy.";
        }
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    $userfname = "";
    $userlname = "";
    $userage = "";
    $useraddress = "";
    $usercnumber = "";
    $useremail = "";
    $userpassword = "";
}
?>
