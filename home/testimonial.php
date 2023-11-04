<?php
require '../api/vendor/autoload.php';

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
        $userfname = $userInfo['fname'];
        $userlname = $userInfo['lname'];
        $userage = $userInfo['age'];
        $useraddress = $userInfo['address'];
        $usercnumber = $userInfo['cnumber'];
        $useremail = $userInfo['email'];
        $userpassword = $userInfo['password'];
    } else {
        // Handle the case where "Username" is not set in the POST request
        // You can display an error message or take appropriate action.
        $userfname = "";
        $userlname = "";
        $userage = "";
        $useraddress = "";
        $usercnumber = "";
        $useremail = "";
        $userpassword = "";
    }

    if (isset($_POST['display'])) {
        // Handle the "Display" button click
        // You can keep your existing display logic here
    } elseif (isset($_POST['update'])) {
        // Handle the "Update" button click
        $Username = $_POST['Username'];
        $userfname = $_POST['fname'];
        $userlname = $_POST['lname'];
        $userage = $_POST['age'];
        $useraddress = $_POST['address'];
        $usercnumber = $_POST['cnumber'];
        $useremail = $_POST['email'];
        $userpassword = $_POST['password'];

        // Create an update filter based on the username
        $filter = ['username' => $Username];

        // Create an update document with the new values
        $updateDocument = [
            '$set' => [
                'fname' => $userfname,
                'lname' => $userlname,
                'age' => $userage,
                'address' => $useraddress,
                'cnumber' => $usercnumber,
                'email' => $useremail,
                'password' => $userpassword
            ]
        ];

        // Perform the update in the MongoDB database
        $result = $collection->updateOne($filter, $updateDocument);

        if ($result->getModifiedCount() > 0) {
            // The update was successful
            echo "User information updated successfully!";
        } else {
            // The update did not modify any documents (username not found)
            echo "User not found or no changes were made.";
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

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>JoyIce</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- slick slider stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- slick slider -->

    <link rel="stylesheet" href="css/slick-theme.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="main_body_content">
        <div class="hero_area">
            <!-- header section strats -->
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.html">
                            JoyIce
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html"> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="chocolate.html">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Daily report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="testimonial.html">Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class ="nav-link" href="../index.html">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <section class="contact_section layout_padding">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                            <div class="form_container">
                                <div class="heading_container">
                                    <h2>
                                        Manage Accounts
                                    </h2>
                                </div>
                                <form action="testimonial.php" method="POST">
                                    <div>
                                        <center>
                                            <h4 style="color:black;">Username<input type="text" name="Username"
                                                id="Username" class="input-text" readonly></h4>
                                                <script>
					// Retrieve the name from localStorage
					var name = localStorage.getItem("Username");
			
					// Display the name on page2.html
					if (name) {
						document.getElementById("Username").value = name;
					}
				</script>
                                            <h4>(please hit enter on your Username to display the other info.)<h4><br>
                                        </center>
                                    </div>
                                    <div>
                                        <input type="text" value="<?= $userfname ?>" placeholder="Firstname" id="fname"
                                            name="fname" />
                                    </div>
                                    <div>
                                        <input type="text" value="<?= $userlname ?>" placeholder="Lastname" id="lname"
                                            name="lname" />
                                    </div>
                                    <div>
                                        <input type="number" value="<?= $userage ?>" placeholder="Age" id="age" name="age" />
                                    </div>
                                    <div>
                                        <input type="text" value="<?= $useraddress ?>" placeholder="Address" id="address"
                                            name="address" />
                                    </div>
                                    <div>
                                        <input type="number" value="<?= $usercnumber ?>"
                                            placeholder="Contact Number" id="cnumber" name="cnumber" />
                                    </div>
                                    <div>
                                        <input type="text" value="<?= $useremail ?>" placeholder="email" id="email"
                                            name="email" />
                                    </div>
                                    <div>
                                        <input type="text" value="<?= $userpassword ?>" placeholder="Password" id="password"
                                            name="password" />
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" id="displayButton" name="display" class="btn btn-primary" style="display:none;">Display</button>
                                        <button type="submit" id="updateButton" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
        <script src="js/custom.js"></script>
    </div>
</body>
</html>
