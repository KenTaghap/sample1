<?php
require 'api/vendor/autoload.php';

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
                                    <a class="nav-link" href="home/index.html">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home/about.html"> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home/chocolate.html">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home/contact.html">Daily report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home/testimonial.php">Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class ="nav-link" href="index.html">Logout</a>
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
                                        Cart
                                    </h2>
                                </div>
                                <form action="cart.php" method="POST">
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
                                            <h4>(please hit enter on your Username to display total products.)<h4><br>
                                        </center>
                                    </div>
                                    <div>
                                        <h4>chocolate Stick</h4>
                                        <input type="number" value="<?= $chocolatecart ?>" placeholder="none" id="inputNumber1"
                                            name="inputNumber1" readonly/>
                                            <input type="number" placeholder="price" id="result1"
                                            name="result1" readonly />
                                    </div>
                                    <div>
                                    <h4>milk Stick</h4>
                                        <input type="number" value="<?= $milkcart ?>" placeholder="none" id="inputNumber2"
                                            name="inputNumber2"  readonly/>
                                            <input type="number"  placeholder="price" id="result2"
                                            name="result2" readonly />
                                    </div>
                                    <div>
                                    <h4>pineapple Stick</h4>
                                        <input type="number" value="<?= $pineapplecart ?>" placeholder="none" id="inputNumber3" name="inputNumber3" readonly/>
                                        <input type="number" placeholder="price" id="result3" name="result3" readonly />
                                    </div>
                                    <div>
                                    <h4>sweetcorn Stick</h4>
                                        <input type="number" value="<?= $sweetcorncart ?>" placeholder="none" id="inputNumber4"
                                            name="inputNumber4" readonly/>
                                            <input type="number"  placeholder="price" id="result4"
                                            name="result4" readonly/>
                                            
                                    </div>
                                    <script>
        function calculateSum(inputId, resultId) {
            var inputElement = document.getElementById(inputId);
            var resultElement = document.getElementById(resultId);
            
            var inputValue = parseFloat(inputElement.value);
            
            if (!isNaN(inputValue)) {
                var sum = 10 * inputValue;
                resultElement.value = sum;
            } else {
                resultElement.value = "";
            }
        }
        
        function initializeTextboxes() {
            for (var i = 1; i <= 5; i++) {
                var inputId = "inputNumber" + i;
                var resultId = "result" + i;
                calculateSum(inputId, resultId);
                
                // Add event listeners for each pair of input and result textboxes
                var inputElement = document.getElementById(inputId);
                inputElement.addEventListener("input", function() {
                    calculateSum(inputId, resultId);
                });
                inputElement.addEventListener("blur", function() {
                    if (inputElement.value === "") {
                        inputElement.value = "please hit enter your username";
                    }
                });
                inputElement.addEventListener("focus", function() {
                    if (inputElement.value === "please hit enter your username") {
                        inputElement.value = "";
                    }
                });
                
                // Check if the textbox is empty when the page loads
                if (inputElement.value === "") {
                    inputElement.value = "please hit enter your username";
                }
            }
        }
        
        // Call the initialization function when the page loads
        window.addEventListener("load", initializeTextboxes);
    </script>
                                    <div>
                                    <h4>watermelon Stick</h4>
                                        <input type="number" value="<?= $watermeloncart ?>"
                                            placeholder="none" id="inputNumber5" name="inputNumber5"  readonly/>
                                            <input type="number"
                                            placeholder="price" id="result5" name="result5" readonly/>
                                            
                                    </div>
                                    
                                    <div class="d-flex">
                                        <button type="submit" id="displayButton" name="display" class="btn btn-primary" style="display:none;">Display</button>
                                        <button type="submit" id="updateButton" name="update" class="btn btn-primary" onclick="submitForm()">Update</button>
                                        <script>
    function submitForm() {
      if (confirm("Are you sure you want to buy this products?")) {
        var form = document.getElementById("cart");
        var formData = new FormData(form);

        // Get the user's email from the URL query parameter
        var urlParams = new URLSearchParams(window.location.search);
        var userEmail = urlParams.get("Username");

        // Add the user's email to the form data
        formData.append("username", userEmail);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              var response = xhr.responseText;
              alert(response);
            }
          }
        };

        xhr.open("POST", "cart.php", true);
        xhr.send(formData);
      } else {
        alert("cannot buy.");
      }
    }
  </script>
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
