<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment Confirmation</title>
	<meta charset="utf-8" />
	<meta name="description" content="Rohirrim Booking Form PHP" />
	<meta name="keywords"    content="PHP" />
	<meta name="author"      content="Ahsan Khan" />
</head>

<body>
<!--Begin processing -->
<?php

	function clean($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if (isset ($_POST["full_name"])) {
		$full_name = clean($_POST["full_name"]);
		echo $full_name; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["email_address"])) {
		$email_address = clean($_POST["email_address"]);
		echo $email_address; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["street_address"])) {
		$street_address = clean($_POST["street_address"]);
		echo $street_address; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["suburb"])) {
		$suburb = clean($_POST["suburb"]);
		echo $suburb; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["postcode"])) {
		$postcode = clean($_POST["postcode"]);
		echo $postcode; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}
	
	if (isset ($_POST["phone_number"])) {
		$phone_number = clean($_POST["phone_number"]);
		echo $phone_number; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}
	
	if (isset ($_POST["preferred_contact_val"])) {
		$preferred_contact_val = clean($_POST["preferred_contact_val"]);
		echo $preferred_contact_val; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["bike_type"])) {
		$bike_type = clean($_POST["bike_type"]);
		echo $bike_type; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["feature"])) {
		$feature = clean($_POST["feature"]);
		echo $feature; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["concern"])) {
		$concern = clean($_POST["concern"]);
		echo $concern; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["quantity"])) {
		$quantity = clean($_POST["quantity"]);
		echo $quantity; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["hidden_bikename"])) {
		$hidden_bikename = clean($_POST["hidden_bikename"]);
		echo $hidden_bikename; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["hidden_bikeprice"])) {
		$hidden_bikeprice = clean($_POST["hidden_bikeprice"]);
		echo $hidden_bikeprice; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["card_type"])) {
		$card_type = clean($_POST["card_type"]);
		echo $card_type; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["card_holder"])) {
		$card_holder = clean($_POST["card_holder"]);
		echo $card_holder; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["card_number"])) {
		$card_number = clean($_POST["card_number"]);
		echo $card_number; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["card_expiry"])) {
		$card_expiry = clean($_POST["card_expiry"]);
		echo $card_expiry; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

	if (isset ($_POST["card_verification"])) {
		$card_verification = clean($_POST["card_verification"]);
		echo $card_verification; 
	} else {
		echo "<p>Error: Enter data in the <a href =\"payment.php\">form</a></p>";
	}

?>

</body>
</html>