<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Assignment 2 Website" />
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta name="keywords" content="Bicycle Hire, Payment Page" />
    <meta name="author" content="Ahsan Khan" />
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Bicycle Hire Payment Page </title>
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
                <li><a href="index.php">Index</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="enquire.php">Enquiry</a></li>
            </ul>

            <h1 class="enquiry_heading">Checkout Page</h1>
            <div class="product_images">
                <img class="bike" id="Bike1" src="images/bike1.png" alt="DiamondBack Bike">
            </div>
            <form id="paymentForm" method="post" action="process_order.php" novalidate="novalidate">
                <fieldset>
                    <legend>Personal Information</legend>
                    <div>
                        <label for="full_name">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" size="25" readonly="readonly" />
                    </div>

                    <div>
                        <label for="email_address">Email Address:</label>
                        <input type="text" name="email_address" id="email_address" size="25" readonly="readonly" />
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>
                    <div>
                        <label for="street_address">Street Address:</label>
                        <input type="text" name="street_address" id="street_address" size="25" readonly="readonly" />
                    </div>

                    <div>
                        <label for="suburb">Suburb:</label>
                        <input type="text" name="suburb" id="suburb" size="15" readonly="readonly" />
                    </div>

                    <div>
                        <label for="state">State:</label>
                        <input type="text" name="state" id="state" size="2" readonly="readonly" />
                    </div>

                    <div>
                        <label for="postcode">Postcode:</label>
                        <input type="text" name="postcode" id="postcode" size="2" readonly="readonly" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Contact</legend>
                    <div>
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" size="10" readonly="readonly" />
                    </div>
                    <div>
                        <label for="preferred_contact">Preferred Contact:</label>
                        <input type="text" name="preferred_contact" id="preferred_contact_val" size="7"
                            readonly="readonly" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Product Information</legend>
                    <div>
                        <label for="bike_type">Bike Type:</label>
                        <input type="text" name="bike_type" id="bike_type" size="12" readonly="readonly" />
                    </div>

                    <div>
                        <label for="feature">Feature:</label>
                        <input type="text" name="feature" id="feature" size="31" readonly="readonly" />
                    </div>

                    <div>
                        <label for="concern">Concern:</label>
                        <input type="text" name="concern" id="concern" size="25" readonly="readonly" />

                        <label for="quantity">Quantity:</label>
                        <input type="text" name="quantity" id="quantity" size="2" readonly="readonly">

                        <input type="hidden" name="bike_name" id="hidden_bikename">
                        <input type="hidden" name="bike_price" id="hidden_bikeprice">
                        <input type="hidden" name="hidden_actual_price" id="hidden_actual_price">
                    </div>
                </fieldset>
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
                            <button type="submit" name="submit_button" class="submission">Checkout</button>
                            <button type="reset" id="cancelOrder" value="Cancel Order">Cancel Order</button>
                        </p>
                    </div>
                </fieldset>
            </form>
        </div>
        <div>

        </div>
        <div class="bike_info">
            <h1 id="bikename" class="product_title"></h1>
            <p>Product Code: ISR192011</p>
            <div>
                <img id="star" src="images/star.png" alt="product stars">
            </div>
            <p id="bikeprice_before"></p>
            <p id="bikeprice"></p>
            <p><strong>Availability:</strong> In Stock</p>
            <p><strong>Condition:</strong> New</p>
        </div>
    </div>

    <?php
	include("./includes/footer.inc");
    ?>
</body>

</html>