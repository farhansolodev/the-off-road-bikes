<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Assignment 2 Website" />
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta name="keywords" content="Bicycle Hire, Fix Order" />
    <meta name="author" content="Ahsan Khan" />
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title> Bicycle Hire Fix Order Page </title>
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>

<body>
    <?php
     	include("./includes/header.inc");  
    ?>

    <h2>Please Fix the Errors</h2>

    <?php 
        // ******************* not from process_order.php, redirection
        if (!isset($_GET["errMsg"])) {
            header("location:enquire.php");
            exit();// terminiate 
        }
        // ********************** from process_order.php
        $errMsg = $_GET["errMsg"];
        // get values
        session_start();
        $fullName = $_SESSION['fullName'];
		$emailAddress = $_SESSION['emailAddress'];
        $streetAddress = $_SESSION['streetAddress'];
        $suburb = $_SESSION['suburb'];
        $state = $_SESSION['state'];
        $postCode = $_SESSION['postCode'];
        $phoneNumber = $_SESSION['phoneNumber'];
        $preferred_contact= $_SESSION['preferred_contact'];
		$bikeType = $_SESSION['bikeType'];
		$feature = $_SESSION['feature'];
		$concern = $_SESSION['concern'];
        $quantity = $_SESSION['quantity'];
		$bikeName = $_SESSION['bikeName'];
        
        $wheels = (strpos($feature,"Wheels")!==false);
        $breaks = (strpos($feature,"Breaks")!==false);
        $seat = (strpos($feature,"Seat")!==false);
        $handles = (strpos($feature,"Handles")!==false);
        $other = (strpos($feature,"Other")!==false);
    ?>

    <div class="enquiry_flex">
        <div class="enquiry_bg">
            <img class="enquiry_bg" src="images/enquiry_bg.jpg" alt="enquiry_bg">
            <!-- https://www.itl.cat/wallview/iomxmR_bicycle-art-wallpapers-hd-resolution-is-4k-wallpaper/ -->
        </div>
        <div class="enquiry_info">
            <ul class="breadcrumb">
                <li><a href="index.php">Index</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="enquire.php">Enquiry</a></li>
            </ul>

            <h1 class="enquiry_heading">Fix your order </h1>
            <div class="err">
                <?php echo $errMsg;?>
            </div>
            <form id="fix_order_form" method="post" action="process_order.php" novalidate="novalidate">
                <!-- Personal Information -->
                <fieldset>
                    <legend>Personal Information</legend>
                    <div>
                        <label for="full_name">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" size="25" value="<?php echo $fullName; ?>" />
                    </div>
                    <p><label for="email_address">Email Address: </label>
                        <input type="email" name="email_address" id="email_address" size="25"
                            value="<?php echo $emailAddress; ?>" />
                    </p>
                </fieldset>
                <!-- Address Information -->
                <fieldset>
                    <legend>Address Information</legend>
                    <p><label for="street_address">Street Address: </label>
                        <input type="text" name="street_address" pattern="^[A-Za-z0-9 ]{1,40}$" id="street_address"
                            size="40" value="<?php echo $streetAddress; ?>" />
                    </p>
                    <p><label for="suburb">Suburb/Town: </label>
                        <input type="text" name="suburb" pattern="^[A-Za-z0-9 ]{1,40}$" id="suburb" size="20"
                            value="<?php echo $suburb; ?>" />
                    </p>
                    <div>
                        <label for="state">State:</label>
                        <p><?php echo $state ?></p>
                    </div>
                    <?php 
                        if ($state=="none"){
                        echo 
                            '<p><label for="state">State: </label>
                                <select name="state" id="state_dropdown">
                                    <option value="none" disabled selected>Select your option</option>
                                    <option value="VIC">VIC</option>
                                    <option value="NSW">NSW</option>
                                    <option value="QLD">QLD</option>
                                    <option value="NT">NT</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="TAS">TAS</option>
                                    <option value="ACT">ACT</option>
                                </select>
                            </p>';
                        } else {
                            echo "<input type='hidden' name='state' id='state' value='$state'>";
                        }
                    ?>
                    <p><label for="postcode">Postcode: </label>
                        <input type="text" name="postcode" pattern="^[1-9]{4}$" id="postcode" size="4"
                            value="<?php echo $postCode; ?>" />
                    </p>
                </fieldset>

                <!-- Contact Information -->
                <fieldset>
                    <legend>Contact Information</legend>
                    <p><label for="phone_number">Phone Number: </label>
                        <input type="text" placeholder="0416111111" name="phone_number" pattern="^[0-9]{10}$"
                            id="phone_number" size="15" value="<?php echo $phoneNumber; ?>" />
                    </p>

                    <p><label for="E-mail">Preferred Contact:</label></p>
                    <div>
                        <label for="E-mail">E-mail:</label>
                        <input class="radio_options" type="radio" name="preferred_contact" id="E-mail" value="E-mail"
                            <?php echo ($preferred_contact=='E-mail')?'checked':'';?> />
                        <label for="post"> Post:</label>
                        <input class="radio_options" type="radio" name="preferred_contact" id="post" value="post"
                            <?php echo ($preferred_contact=='post')?'checked':'';?> />
                        <label for="phone"> Phone:</label>
                        <input class="radio_options" type="radio" name="preferred_contact" id="phone" value="phone"
                            <?php echo ($preferred_contact=='phone')?'checked':'';?> />
                    </div>
                </fieldset>

                <!-- Product Information -->
                <fieldset>
                    <legend>Product Information</legend>
                    <div>
                        <label for="bikeType">Bike Type:</label>
                        <p><?php echo $bikeType ?></p>
                    </div>
                    <?php 
                    if ($bikeType=="none"){
                    echo
                        '<p><label for="bike_type">Bike Type</label>
                            <select name="bike_type" id="bike_type">
                                <option value="none" >Select your option</option>
                                <option value="Mountain Bike">Mountain Bike</option>
                                <option value="BMX">BMX</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Road">Road</option>
                            </select>
                        </p>';
                    } else {
                            echo "<input type='hidden' name='bike_type' id='state' value='$bikeType'>";
                    }
                    ?>
                    <p><label for="wheels">Feature: </label>
                        <label for="wheels">Wheels</label>
                        <input type="checkbox" id="wheels" name="featureArray[]" value="Wheels"
                            <?php echo ($wheels)?"checked":"";?> />

                        <label for="breaks">Breaks</label>
                        <input type="checkbox" id="breaks" name="featureArray[]" value="Breaks"
                            <?php echo ($breaks)?"checked":"";?> />

                        <label for="seat">Seat</label>
                        <input type="checkbox" id="seat" name="featureArray[]" value="Seat"
                            <?php echo ($seat)?"checked":"";?> />

                        <label for="handles">Handles</label>
                        <input type="checkbox" id="handles" name="featureArray[]" value="Handles"
                            <?php echo ($handles)?"checked":"";?> />

                        <label for="other">Other</label>
                        <input type="checkbox" id="other" name="featureArray[]" value="Other"
                            <?php echo ($other)?"checked":"";?> />
                    </p>
                </fieldset>

                <!-- Concern -->
                <fieldset>
                    <legend>Describe Your Concern</legend>
                    <textarea placeholder="Write the description of your question/issue here" id="description"
                        name="concern" rows="7" cols="40"><?php echo $concern; ?></textarea>
                </fieldset>

                <!-- Product Range -->
                <fieldset>
                    <legend>Product Range</legend>
                    <p>
                        <label id="bike_name"></label>
                    </p>
                    <p>
                        <label id="actual_price"></label>
                    </p>
                    <section class="similar_flex" id="similar_flex">
                        <div>
                            <button type="button" id="EuroSmith">
                                <img class="similar_bikes" src="images/bike2.png" alt="DiamondBack Bike">
                                <span class="bike_name">EuroSmith 2016 MTB</span>
                                <span class="bike_price">$159.99</span>
                            </button>
                        </div>
                        <div>
                            <button type="button" id="ADL">
                                <img class="similar_bikes" src="images/bike1.png" alt="Nashbar Bike">
                                <span class="bike_name">ADL 2012 MTB</span>
                                <span class="bike_price">$219.99</span>
                            </button>
                        </div>

                        <div>
                            <button type="button" id="Nashbar">
                                <img class="similar_bikes" src="images/bike3.png" alt="Eurosmith Bike">
                                <span class="bike_name">Nashbar AT2 MB</span>
                                <span class="bike_price">$89.99</span>
                            </button>
                        </div>

                        <div>
                            <button type="button" id="SmithWeson">
                                <img class="similar_bikes" src="images/bike2.png" alt="DiamondBack Bike">
                                <span class="bike_name">SmithWeson 2012 RT</span>
                                <span class="bike_price">$59.99</span>
                            </button>
                        </div>

                        <div>
                            <button type="button" id="Marooned">
                                <img class="similar_bikes" src="images/bike1.png" alt="Nashbar Bike">
                                <span class="bike_name">Marooned 2019 SB</span>
                                <span class="bike_price">$174.99</span>
                            </button>
                        </div>
                    </section>
                </fieldset>

                <!-- Quantity -->
                <div>
                    <div>
                        <label for="bikeType">Quantity:</label>
                        <p><?php echo $quantity ?></p>
                    </div>
                    <?php 
                    if ($quantity==0){
                    echo
                        '<label for="quantity">Quantity: </label>
                        <select class="quantity" name="quantity[]" id="quantity">
                            <option value="0" >Select quantity</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>';
                    } else {
                            echo "<input type='hidden' name='quantity[]' id='quantity' value='$quantity'>";
                    }
                    ?>
                    <input type="hidden" name="bike_name" id="hidden_bikename">
                    <input type="hidden" name="hidden_actual_price" id="hidden_actual_price">
                </div>

                <!-- Credit Card Details -->
                <fieldset>
                    <legend>Credit Card Details:</legend>
                    <div>
                        <p>
                            <label for="card_type">Card Type: </label>
                            <select name="card_type[]" id="card_type">
                                <option value="none">Select Card Type</option>
                                <option value="Visa">Visa</option>
                                <option value="Mastercard">Mastercard</option>
                                <option value="American Express">American Express</option>
                            </select>
                            <label for="card_holder">Card Holder Name: </label>
                            <input type="text" name="card_holder" id="card_holder" size="15" />
                        </p>
                        <p>
                            <label for="card_number">Card Number: </label>
                            <input type="text" name="card_number" id="card_number" size="25" />
                        </p>
                        <label for="card_expiry">Expiry Date: </label>
                        <input type="text" name="card_expiry" id="card_expiry" size="7" />
                        <label for="card_verification">CVV: </label>
                        <input type="text" name="card_verification" id="card_verification" size="5" />

                    </div>
                    <div>
                        <p>
                            <button type="submit" name="submit_button" class="submission"
                                id="checkout">Checkout</button>
                        </p>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <?php
	include("./includes/footer.inc");
    ?>

</body>

</html>