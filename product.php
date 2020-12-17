<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
	<meta name="description" content="Assignment 1 Website"/>
	<meta name="viewport" content="width=device-width initial-scale=1"> 
	<meta name="keywords" content="Bicycle Hire, Product Page" />
	<meta name="author" content="Ahsan Khan"  />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="./styles/style.css" rel="stylesheet">
	<title> Bicycle Hire Product Page </title>
</head>

<body>
	<?php
		include("./includes/header.inc");  
	?>
<ul class="breadcrumb">
  	<li><a href="./index.php">Index</a></li>
  	<li><a href="./product.php">Product</a></li>
</ul>

<section class="product_flex"> 
	<div class="product_images">
		<img class="bike" id="Bike1" src="images/bike1.png" alt="DiamondBack Bike">
	</div>

	<div class="Product_Info">
		<p class="new">New</p>
		<h1 class="product_title">DIAMONDBACK 2012 OVERDRIVE</h1>
		<p>Product Code: ISR192011</p>
		<img id="star" src="images/star.png" alt="product stars">
		<h2>USD: $79.99-94.99</h2>
		<p><strong>Availability:</strong> In Stock</p>
		<p><strong>Condition:</strong> New</p>
		<p><strong>Brand:</strong> DiamondBack</p>
		<select class="select_color">
    		<option value="0">Select Color:</option>
    		<option value="1">Black</option>
    		<option value="2">Red</option>
    		<option value="3">Green</option>
    		<option value="4">Blue</option>
    		<option value="5">White</option>
    	</select>
    		<p class="quantity">Quantity:</p>
    	<select class="quantity">
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    	</select>
    	<button id="add_to_cart">Add To Cart</button>
	</div>
		<?php
			include("./includes/menu.inc"); 
		?>
</section>
<hr>
<h3 class="info_title">Similar Products</h3>

<section class="similar_flex">
	<div>
		<img class="similar_bikes" src="images/bike2.png" alt="DiamondBack Bike">
		<h4 class="bike_name">EuroSmith 2016 MTB</h4>
		<p class="bike_price"> $159.99</p>
	</div>

	<div>
		<img class="similar_bikes" src="images/bike1.png" alt="Nashbar Bike">
		<h4 class="bike_name">ADL 2012 MTB</h4>
		<p class="bike_price"> $219.99</p>
	</div>

	<div>
		<img class="similar_bikes" src="images/bike3.png" alt="Eurosmith Bike">
		<h4 class="bike_name">Nashbar AT2 MB</h4>
		<p class="bike_price"> $89.99</p>
	</div>

	<div>
		<img class="similar_bikes" src="images/bike2.png" alt="DiamondBack Bike">
		<h4 class="bike_name">SmithWeson 2012 RT</h4>
		<p class="bike_price"> $159.99</p>
	</div>

	<div>
		<img class="similar_bikes" src="images/bike1.png" alt="Nashbar Bike">
		<h4 class="bike_name">Marooned 2019 SB</h4>
		<p class="bike_price"> $174.99</p>
	</div>
</section>

<hr>
<h3 class="info_title">Product Description</h3>
<div class="table_flex">
	<div>
		<h4 class="caption">Technical Details</h4>
	   <table class="product_description">
	   		<tr>
	   			<td>Height</td>
	   			<td>0.38 metres</td>
	   		</tr>
	   		<tr>
	   			<td>Length</td>
	   			<td>0.62 metres</td>
	   		</tr>
	   		<tr>
	   			<td>Weight</td>
	   			<td>2.92 Kilograms</td>
	   		</tr>
	   		<tr>
	   			<td>Wheel Weight</td>
	   			<td>200 grams/wheel</td>
	   		</tr>
	   		<tr>
	   			<td>Brand</td>
	   			<td>DIAMONDBACK</td>
	   		</tr>
	   </table> 
	   		<p class="caption"> Assembly Information</p> 
	   		<ol type="1">
	   			<li>Find the owner’s manual.</li>
	   			<li>Check if all parts are included using the owner's manual.</li>
	   			<li>Get relevant tools such as allen keys and phillips head screwdriver</li>
	   			<li>Lubricate the parts</li>
	   			<li>Attach the seat at the desired height</li>
	   			<li>Inflate the tires</li>
	   			<li>Enjoy!</li>
	   		</ol>
	</div>

	<div>
		<p class="caption">Additional Information</p>
		<p class="bike_information"> DiamondBack have always been the upper echelon when it came to classic mountain bike design and this one is no exception.
			Lower overall weight and suspensions allow for ideal cruising through the neighbourhood streets, while bolstering a set of wheels
			perfect for an offroad trail. With improved break design and turning radius, not only is it one of the fastest in the market,
			it is also one of the safest. The lower weight distribution allows for a range of tricks such as wheelies and bunny-hops that are 
			usually very difficult with most mountain bikes. A smaller footprint allows the rider to manage narrow pathways with ease.
			<br> The original version from 1982 was quite special in its own regard but has been trampled through the passage of time, but thankfully,  
			DiamondBack is here to shed some well-deserved light on a classic bike for the modern age; now at a more affordable price!
			<br> Available for rent in a wider selection of colors at the store.
		</p>
	</div>
</div>



<?php
	include("./includes/footer.inc");
?>

</body>
</html>