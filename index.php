<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Assignment 1 Website" />
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="keywords" content="Bicycle Hire, Index Page" />
    <meta name="author" content="Ahsan Khan" />
    <link href="./styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- bootstrap icons -->
    <title> Bicycle Hire Home Page</title>
</head>

<body>
    <?php
     	include("./includes/header.inc");  
	?>
    <div>
        <form action="product.php">
            <button id="Banner_btn"><strong>SEE MTB MODELS</strong></button>
        </form>
        <img id="banner" src="images/banner.png" alt="Banner">
    </div>

    <h2><strong>TORB</strong><sup>®</sup><span id="vertical_line"> | </span> NEW ARRIVALS </h2>

    <div class="flex_container">
        <div id="first_item">
            <img class="bike" id="Bike1" src="images/bike1.png" alt="DiamondBack Bike">
            <!-- https://livedemo00.template-help.com/woocommerce_55762/wp-content/uploads/2015/10/Diamondback-2013-Overdrive-29er-Mountain-Bike-with-29-Inch-Wheels_01-370x370.png -->
            <h3 class="product_name">DIAMONDBACK 2012 OVERDRIVE</h3>
            <p class="price">$80.00-95.00</p>
            <p>Product Information: Speeding down the streets with a Diamondback is one of many's fond childhood
                memories.<br>
                With an improved gear transmission and tire durability, this one is worthy for a revisit.</p>
            <p><button class="add_to_cart">Add to Cart</button></p>
        </div>

        <div class="second_item">
            <img class="bike" id="Bike2" src="images/bike2.png" alt="DiamondBack Bike">
            <!--https://livedemo00.template-help.com/woocommerce_55762/wp-content/uploads/2015/10/2014-Kestrel-Talon-Road-Shimano-105-Carbon-Fiber-Bike_02.png-->
            <h3 class="product_name">EUROSMITH 2016<br> MTB</h3>
            <p class="price">$120.00-135.00</p>
            <p>Product Information: Speeding down the streets with a Diamondback is one of many's fond childhood
                memories.<br>
                With an improved gear transmission and tire durability, this one is worthy for a revisit.</p>
            <p><button class="add_to_cart">Add to Cart</button></p>
        </div>

        <?php
			include("./includes/menu.inc");
		?>
    </div>



    <?php
		include("./includes/footer.inc");
	?>

</body>

</html>