<?php

	function clean($data){
		$data = ($data=="")?"":trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if (!isset($_POST["submit_button"])) {
		header("location:enquire.php");
		exit();
	}

	$errMsg = "";

	$fullName = clean($_POST["full_name"]);
	if ($fullName == "") {
		$errMsg .= "<p>Please enter your full name.</p>"; 
	} else if (!preg_match("/^[A-Za-z ]{1,40}$/", $fullName)) {
		$errMsg .= "<p>Only alpha letters allowed for full name.</p>";
	}

	$emailAddress = clean($_POST["email_address"]);
	if ($_POST["email_address"] == "") { 
		$errMsg .= "<p>You must enter your email address</p>";
	}

	$streetAddress = clean($_POST["street_address"]);
	if ($_POST["street_address"] == "") {
		$errMsg .= "<p>You must enter your street address</p>"; 
	} else if (!preg_match("/^[A-Za-z0-9 ]{1,40}$/", $streetAddress)){
		$errMsg .= "<p>Please enter your street address only using a maximum of 40 alpha-numeric characters.</p>";
	}

	$suburb = clean($_POST["suburb"]);
	if ($suburb == "") {
		$errMsg .= "<p>Please enter your suburb.</p>";
	} else if (!preg_match("/^[A-Za-z0-9 ]{1,40}$/",$suburb)) {
		$errMsg .= "<p>Please enter your suburb only using a maximum of 40 alpha-numeric characters.</p>";
	}
	
	$stateCodes = array(
		'VIC' => array('3','8'),
		'NSW' => array('1','2'),
		'QLD' => array('4','9'),
		'NT' => array('0'),
		'WA' => array('6'),
		'TAS' => array('5'),
		'ACT' => array('0'),
	);
	
	/** Sanitizes postcode entered by user */
	$postCode = clean($_POST["postcode"]);
	/** Check if postcode field returned empty */
	if ($postCode == "") { //** POSTCODE FIELD EMPTY */
		$errMsg .= "<p>You must enter your postcode.</p>";
		if (!array_key_exists("state",$_POST)){
			$errMsg .= "<p>Please select a state</p>";
			$state = "none";
		} else {
			/** Sanitizes state entered by user */
			$state = clean($_POST["state"]);
			/** Check if state field returned empty */
			if ($state == "none") { //** NO STATE CHOSEN */
				$errMsg .= "<p>Please select a state</p>";
			} else { //** STATE CHOSEN */
				$errMsg .= "<p>Post code has to belong to the chosen state</p>";
			}
		}
	} else { //** POSTCODE FIELD NOT EMPTY */
		/** Using regex to validate entered postcode */
		if (!preg_match("/^[0-9]{4}$/", $postCode)) { //** INVALID POSTCODE */
			$errMsg .= "<p>Post code should be 4 digits and only use number</p>";
		}
		if (!array_key_exists("state",$_POST)){
			$errMsg .= "<p>Please select a state</p>";
			$state = "none";
		} else {
			/** Sanitizes state entered by user */
			$state = clean($_POST["state"]);
			/** Check if state field returned empty */
			if ($state == "none") { //** NO STATE CHOSEN */
				$errMsg .= "<p>Please select a state</p>";
			} else { //** STATE CHOSEN */
				/**
				 * Check if first character of entered postcode 
				 * can be found in array of statecodes associated
				 * with the entered state
				 */ 
				if (!in_array($postCode[0],$stateCodes[$state])){ //** STATE DOES NOT MATCH POSTCODE */
					$errMsg .= "<p>Post code has to belong to the chosen state</p>";
					// echo "<p>Post code has to belong to the chosen state</p>";
				}
			}
		}
	}
	
	$phoneNumber = clean($_POST["phone_number"]);
	if ($phoneNumber == "") {
		$errMsg .= "<p>You must enter your phone number.</p>"; 
	} else if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
		$errMsg .= "<p>Phone number should be 10 digits and only use numbers</p>";
	}

	if (!isset($_POST["preferred_contact"])) {
		$errMsg .= "<p>Please enter your preferred contact method</p>";
	} else {
		$preferred_contact = clean($_POST["preferred_contact"]);
	}

	$bikeType = clean($_POST["bike_type"]);
	if ($bikeType == "none") {
		$errMsg  .= "<p>Please select a bike type</p>";
	}

	if(!array_key_exists("feature",$_POST)){
		if (!isset($_POST["featureArray"])) {
			$errMsg  .= "<p>Please select a feature</p>";
			$feature="";
		} else {
			$featureArray=$_POST["featureArray"];  // array
			$featureString=implode(",",$featureArray); //make the array a comma-separated string
			$feature=clean($featureString);
		}
	} else {
		$feature = clean($_POST["feature"]);
		if ($feature == ""){
			$errMsg  .= "<p>Please select a feature</p>";
		}
	}

	if(!array_key_exists("concern",$_POST)){
		$errMsg .= "<p>You must describe your problem</p>";
		$concern = "";
	} else {
		$concern = clean($_POST["concern"]);
		if ($concern == "") {
			$errMsg .= "<p>You must describe your problem</p>"; 
		}
	}
	
	if(!array_key_exists("hidden_actual_price",$_POST)){
		$errMsg .= "<p>Please pick a bike</p>";
		$bikeprice = 0;
	} else {
		$bikeprice = clean($_POST["hidden_actual_price"]);
		if ($bikeprice == ""){
			$errMsg .= "<p>Please pick a bike</p>";
			$bikeprice = 0;
		}
	}

	if(!array_key_exists("quantity",$_POST)){
		$errMsg .= "<p>You must choose the number of bikes</p>";
	} else {
		$quantity = clean($_POST["quantity"][0]);
		if ($quantity == 0) {
			$errMsg .= "<p>You must choose the number of bikes</p>";
		}
	}
	
	if(!isset($_POST["card_type"])){
		header("location:enquire.php");
		exit();
	} else {
		$card_type = clean($_POST["card_type"][0]);
		if ($card_type == "none") {
			$errMsg .= "<p>Choose a card type</p>";
		}
	}

	$cardHolder = clean($_POST["card_holder"]);
	if ($cardHolder == "") {
		$errMsg .= "<p>You must enter the card holder name.</p>"; 
	} else if (!preg_match("/^[A-Za-z ]{1,40}$/", $cardHolder)) {
		$errMsg .= "<p>Only alpha letters allowed for holder name</p>";
	}

	$card_number = clean($_POST["card_number"]);
	if ($card_number == "") {
		$errMsg .= "<p>Enter your card number</p>";
	} else {
		if ($card_type == "Visa"){
			if (!preg_match("/^[0-9]{16}$/",$card_number)){
				$errMsg .= "<p>Please enter a card number of 16 digits</p>";
			} else if (substr($card_number,0,1) != 4){
				$errMsg .= "<p>Please enter a card number starting with 4</p>";
			}
		} else if ($card_type == "Mastercard") {
			if (!preg_match("/^[0-9]{16}$/",$card_number)){
				$errMsg .= "<p>Please enter a card number of 16 digits</p>";
			} else if (substr($card_number,0,2) != 51 && substr($card_number,0,2) != 52 && substr($card_number,0,2) != 53 
					&& substr($card_number,0,2) != 54 && substr($card_number,0,2) != 55)
			{
				$errMsg .= "<p>Please enter a card number starting with 51 to 55</p>";
			}
		} else if ($card_type == "American Express") {
			if (!preg_match("/^[0-9]{15}$/",$card_number)){
				$errMsg .= "<p>Please enter a card number of 15 digits</p>";
			} else if (substr($card_number,0,2) != 35 && substr($card_number,0,2) != 37){
				$errMsg .= "<p>Please enter a card number starting with 35 or 37</p>";
			}
		}	
	}

	$cardExpiry = clean($_POST["card_expiry"]);
	if ($cardExpiry == "") {
		$errMsg .= "<p>You must enter the card expiry date.</p>"; 
	} else if (!preg_match("/0[1-9]|1[0-2]\/[2-9][0-9]/", $cardExpiry)) {
		$errMsg .= "<p>Please enter a valid expiry date in mm/yy</p>";
	}

	$cvv = clean($_POST["card_verification"]);
	if ($cvv == "") {
		$errMsg .= "<p>You must enter your CVV</p>"; 
	} else if (!preg_match("/^[0-9]{3}$/", $cvv)) {
		$errMsg .= "<p>Please enter a CVV using 3 digits only</p>";
	}

	$bikeName = $_POST['bike_name'];

	// ********************** there are errors, redirect to fix_order.php
	if ($errMsg!=""){
		session_start();
		$_SESSION['fullName'] = $fullName;
		$_SESSION['emailAddress'] = $emailAddress;
		$_SESSION['streetAddress'] = $streetAddress;
		$_SESSION['suburb'] = $suburb;
		$_SESSION['state'] = $state;
		$_SESSION['postCode'] = $postCode;
		$_SESSION['phoneNumber'] = $phoneNumber;
		$_SESSION['preferred_contact'] = $preferred_contact;
		$_SESSION['bikeType'] = $bikeType;
		$_SESSION['feature'] = $feature;
		$_SESSION['concern'] = $concern;
		$_SESSION['quantity'] = $quantity;
		$_SESSION['bikeName'] = $bikeName;
		
		header("location:fix_order.php?errMsg=$errMsg");
		exit();
	}
	
	// ********************** no error, insert into database , redirect to receipt.php
	$db_msg="";
	require_once "settings.php";
	$conn = mysqli_connect($host,$user,$pwd,$sql_db);
	
	if ($conn) { 
		$create_table = "CREATE TABLE IF NOT EXISTS orders (
			order_id INT AUTO_INCREMENT PRIMARY KEY,
			full_name VARCHAR(50),
			email_address VARCHAR(50),
			street_address VARCHAR(50),
			suburb VARCHAR(20),
			state_id VARCHAR(5), #dropdown 
			post_code CHAR(4),
			phone_number CHAR(10),
			preferred_contact VARCHAR(20), #radio
			bike_type VARCHAR(40), #dropdown
			feature VARCHAR(50), #checkboxes
			concern VARCHAR(255), #textarea
			bike_name VARCHAR(50),
			quantity INT, #dropdown
			card_type VARCHAR(40), #dropdown
			card_holder VARCHAR(50),
			card_number VARCHAR(40),
			expiry VARCHAR(50),
			cvv CHAR(3),
			order_cost DECIMAL(10,2),
			order_time DATETIME,
			order_status VARCHAR(40)
		   )";
		
		$result = mysqli_query($conn, $create_table);
		if ($result) {	// create table successfull	
			// calculate cost
			$totalPrice = $quantity * $bikeprice;
			// date time
			$datetime = date('Y-m-d H:i:s');
			//insert orders into table
			$insert_into_table = "INSERT INTO orders (full_name, email_address, street_address, 
					suburb, state_id, post_code, phone_number, preferred_contact, bike_type, 
					feature, concern, bike_name, quantity, card_type, card_holder, card_number, expiry, 
					cvv, order_cost, order_time, order_status)
					VALUES ('$fullName','$emailAddress','$streetAddress','$suburb','$state',
					'$postCode','$phoneNumber','$preferred_contact','$bikeType','$feature',
					'$concern', '$bikeName',$quantity,'$card_type','$cardHolder','$card_number','$cardExpiry',
					'$cvv',$totalPrice,'$datetime','PENDING')";
			
			$insert_into_db = mysqli_query($conn,$insert_into_table);

			if ($insert_into_db) { //insert successful
				$db_msg = "<table class='receiptTable'><tr><th>Item</th><th>Value</th></tr>"
				. "<tr><th>Order ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
				. "<tr><th>Full Name</th><td>$fullName</td></tr>"
				. "<tr><th>Email</th><td>$emailAddress</td></tr>"
				. "<tr><th>Street Address</th><td>$streetAddress</td></tr>"
				. "<tr><th>Suburb</th><td>$suburb</td></tr>"
				. "<tr><th>State</th><td>$state</td></tr>"
				. "<tr><th>Postcode</th><td>$postCode</td></tr>"
				. "<tr><th>Phone Number</th><td>$phoneNumber</td></tr>"
				. "<tr><th>Preferred Contact</th><td>$preferred_contact</td></tr>"
				. "<tr><th>Bike Type</th><td>$bikeType</td></tr>"
				. "<tr><th>Feature</th><td>$feature</td></tr>"
				. "<tr><th>Concern</th><td>$concern</td></tr>"
				. "<tr><th>Chosen Bike</th><td>$bikeName</td></tr>"
				. "<tr><th>Quantity</th><td>$quantity</td></tr>"
				. "<tr><th>Card Type</th><td>*****</td></tr>"
				. "<tr><th>Card Holder</th><td>*****</td></tr>"
				. "<tr><th>Card Number</th><td>*****</td></tr>"
				. "<tr><th>Card Expiry</th><td>*****</td></tr>"
				. "<tr><th>CVV</th><td>***</td></tr>"
				. "<tr><th>Total Price</th><td>$totalPrice</td></tr>"
				. "<tr><th>Date</th><td>$datetime</td></tr>"
				. "<tr><th>Order Status</th><td>PENDING</td></tr>"
				. "</table>";
			} else {
				$db_msg= "<p>Insert  unsuccessful.</p>";
			}
		} else {
			$db_msg= "<p>Create table operation unsuccessful.</p>";
		}
		mysqli_close ($conn); // Close database connection
	} else {
		$db_msg= "<p>Unable to connect to the database.</p>";
	}
	//  redirect to receipt.php
	echo $db_msg;
	header("location:receipt.php?db_msg=$db_msg");