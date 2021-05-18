<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Assignment 2 Website" />
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta name="keywords" content="Bicycle Hire, Enquiry Page" />
    <meta name="author" content="Ahsan Khan" />
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title> Bicycle Hire Enquiry Page </title>
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>

<body>
    <?php
     	include("./includes/header.inc");  
	?>

    <div class="enquiry_flex">
        <div class="enquiry_bg">
            <img class="enquiry_bg" src="images/enquiry_bg.jpg" alt="enquiry_bg">
            <!-- https://www.itl.cat/wallview/iomxmR_bicycle-art-wallpapers-hd-resolution-is-4k-wallpaper/ -->
        </div>
        <div class="enquiry_info">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="enquire.php">Purchase</a></li>
            </ul>

            <h1 class="enquiry_heading">Purchase</h1>
            <p> Please enter your personal information. If you have any enquiries regarding a specific product or your order, we will get back to you soon</p>
            <form id="enquireForm" method="post" action="payment.php" novalidate="novalidate">
                <fieldset>
                    <legend>Personal Information</legend>
                    <p><label for="first_name">First Name: </label>
                        <input type="text" name="first_name" pattern="^[A-Za-z]{1,25}$" id="first_name" size="25"
                            required="required" />
                        <label for="last_name">Last Name: </label>
                        <input type="text" name="last_name" pattern="^[A-Za-z]{1,25}$" id="last_name" size="25"
                            required="required" />
                    </p>

                    <p><label for="email_address">Email Address: </label>
                        <input type="email" name="email_address" id="email_address" size="25" required="required" />
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Address Information</legend>
                    <p><label for="street_address">Street Address: </label>
                        <input type="text" name="street_address" pattern="^[A-Za-z0-9 ]{1,40}$" id="street_address"
                            size="40" required="required" />
                    </p>
                    <p><label for="suburb">Suburb/Town: </label>
                        <input type="text" name="suburb" pattern="^[A-Za-z0-9 ]{1,40}$" id="suburb" size="20"
                            required="required" />
                    </p>
                    <p><label for="state">State: </label>
                        <select name="state" id="state">
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
                    </p>
                    <p><label for="postcode">Postcode: </label>
                        <input type="text" name="postcode" pattern="^[1-9]{4}$" id="postcode" size="4"
                            required="required" />
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Contact Information</legend>
                    <p><label for="phone_number">Phone Number: </label>
                        <input type="text" placeholder="0416111111" name="phone_number" pattern="^[0-9]{10}$"
                            id="phone_number" size="15" required="required" />
                    </p>

                    <p><label for="E-mail">Preferred Contact:</label></p>
                    <div>
                        <label for="E-mail">E-mail:</label>
                        <input class="radio_options" type="radio" name="preferred_contact" id="E-mail" value="E-mail"
                            required="required" />
                        <label for="post"> Post:</label>
                        <input class="radio_options" type="radio" name="preferred_contact" id="post" value="post" />

                        <label for="phone"> Phone:</label>
                        <input class="radio_options" checked=checked type="radio" name="preferred_contact" id="phone"
                            value="phone" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Product Information</legend>
                    <p><label for="bike_type">Bike Type</label>
                        <select name="bike_type" id="bike_type">
                            <option value="none">Select your option</option>
                            <option value="Mountain Bike">Mountain Bike</option>
                            <option value="BMX">BMX</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Road">Road</option>
                        </select>
                    </p>
                    <p><label for="wheels">Feature: </label>
                        <label for="wheels">Wheels</label>
                        <input type="checkbox" id="wheels" name="wheels" value="wheels" />

                        <label for="breaks">Breaks</label>
                        <input type="checkbox" id="breaks" name="breaks" value="breaks" />

                        <label for="seat">Seat</label>
                        <input type="checkbox" id="seat" name="seat" value="seat" />

                        <label for="handles">Handles</label>
                        <input type="checkbox" id="handles" name="handles" value="handles" />

                        <label for="other">Other</label>
                        <input type="checkbox" id="other" name="other" value="other" checked="checked" />
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Additional information</legend>
                    <textarea placeholder="Add any additional comments about your purchase if required" id="description"
                        name="description" rows="7" cols="40" required="required"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Product Range</legend>
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
                <div>
                    <label for="quantity">Quantity: </label>
                    <select class="quantity" id="quantity">
                        <option value="0" >Select quantity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="submission">
                    Pay Now
                </button>
                <button class="submission" onclick="clearBikeChoice()" type="reset">Reset</button>
            </form>
        </div>
    </div>

    <?php
		include("./includes/footer.inc");
	?>

</body>

</html>
