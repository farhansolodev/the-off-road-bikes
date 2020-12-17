/**
* Author: Ahsan 102890193
* Target: enquire.html, payment.html
* Purpose: adding dynamic behavior to the html 
* Created: 4/21/2020
* Last updated: 4/21/2020
* Credits: 
*/

"use strict" 
//validate enquire form
function validateEnquire() {
	var errMsg = "";
	var result = true; 

	var first_name=document.getElementById("first_name").value.trim();
	var last_name=document.getElementById("last_name").value.trim();
	var email_address=document.getElementById("email_address").value.trim();
	var street_address=document.getElementById("street_address").value.trim();
	var suburb=document.getElementById("suburb").value.trim();
	var state=document.getElementById("state").value;
	var postcode=document.getElementById("postcode").value;
	var phone_number=document.getElementById("phone_number").value.trim();
	var radios = document.getElementsByName("preferred_contact");
	var bike_type = document.getElementById("bike_type").value; 
	var description = document.getElementById("description").value; 
	var quantity = document.getElementById("quantity").value; 

	var wheels = document.getElementById("wheels").checked; 
	var breaks = document.getElementById("breaks").checked;
	var seat = document.getElementById("seat").checked;
	var handles = document.getElementById("handles").checked;
	var other = document.getElementById("other").checked;

	// var stateCodes = { //object to store the postcode starting values to the right state
	// 	VIC: ['3', '8'],
  	// 	NSW: ['1', '2'],
  	// 	QLD: ['4', '9'],
  	// 	NT: ['0'],
  	// 	WA: ['6'],
  	// 	TAS: ['5'],
  	// 	ACT: ['0'],
	// };
	
	// if (document.getElementById("state").value == "none") { //if the state selection was not made
	// 	errMsg = errMsg + "Please select a state\n"
	// 	result = false;
	// } else if (!stateCodes[state].includes(postcode[0])) { //else check if the statecode includes the first number of the postcode
	// 	errMsg = errMsg + "Post code has to belong to the chosen state\n" 
	// 	result = false; 
	// }

	// if (!first_name.match(/^[A-Za-z]{1,25}$/)) {
	// 	errMsg = errMsg + "Please enter your first name using only letters and be less than 25 characters\n"
	// 	result = false; 
	// }
	/*
	if (!last_name.match(/^[A-Za-z]{1,25}$/)) { 
		errMsg = errMsg + "Please enter your last name using only letters and be less than 25 characters\n"
		result = false; 
	}

	if (email_address == "") {
		errMsg = errMsg + "Please enter the email\n"
		result = false; 
	}

	if (!street_address.match(/^[A-Za-z0-9 ]{1,40}$/)) {
		errMsg = errMsg + "Please enter your street address using only letters and numbers\n"
		result = false; 
	}
	
	if (!suburb.match(/^[A-Za-z0-9 ]{1,40}$/)) {
		errMsg = errMsg + "Please enter your suburb/town using only letters and numbers\n"
		result = false; 
	}
	
	if (!postcode.match(/^[0-9]{4}$/)) {
		errMsg = errMsg + "Post code should be 4 digits and only use numbers\n"
		result = false; 
	}

	if (!phone_number.match(/^[0-9]{10}$/)) {
		errMsg = errMsg + "Phone number should be 10 digits and only use numbers\n"
		result = false; 
	}

	if (bike_type == "none") { 
		errMsg = errMsg + "Please select a bike type\n"
		result = false;
	}

	if (!(wheels || breaks || seat || handles || other)) {
		errMsg = errMsg + "Please select at least one feature\n";
		result = false; 
	}

	if (description == "") {
		errMsg = errMsg + "Please fill in the description\n";
		result = false;
	}

	if (document.getElementById("quantity").value == "none") { 
		errMsg = errMsg + "Please select a quantity\n"
		result = false;
	}

	if (localStorage.getItem("chosenBike") == null) {
		errMsg = errMsg + "Please select a bike\n"
		result = false;
	}
	*/
	
	if (result) { //call the storeFeature method to store the values of the bike feature choices, if result is true
		storeFeature(wheels, breaks, seat, handles, other)
	}

	if (errMsg != "") { //if the error message variable is not empty, display the error
		alert(errMsg);
	} else { //else call the saveEnquireInfo method which stores all the validated values
		saveEnquireInfo(first_name, last_name, email_address, street_address, suburb, state, postcode, phone_number, radios, bike_type, description, quantity)
	}
	return result; 
}
//validate payment form
function validatePayment(){
	var errMsg=""; 
	var result=true;

	//*	var card_type = document.getElementById("card_type").value;
	var card_holder = document.getElementById("card_holder").value;
	var card_number = document.getElementById("card_number").value;
	var card_number_sub = card_number.substr(0,2); 
	var card_expiry = document.getElementById("card_expiry").value;
	var cvv = document.getElementById("card_verification").value; 

	/*
	if (card_type == "none") { //if card_type value is not chosen, display the error
		errMsg = errMsg + "Please select a card type\n"
		result = false;
	} 

	else if (card_type == "Visa") { //if card_type value is Visa, validate the card_number value
		if(!card_number.match(/^[0-9]{16}$/)){
			errMsg = errMsg + "Please enter a card number of 16 digits\n"
			result = false; 
		} else if (!card_number.startsWith("4")) {
			errMsg = errMsg + "Please enter a card number starting with 4\n"
			result = false;
		}
	} 

	else if (card_type == "Mastercard") { //if card_type value is Mastercard, validate the card_number value
		if(!card_number.match(/^[0-9]{16}$/)){
			errMsg = errMsg + "Please enter a card number of 16 digits\n"
			result = false; 
		} else if (!(card_number_sub === "51" || card_number_sub === "52" || card_number_sub === "53" || card_number_sub === "54" || card_number_sub === "55")) {
			errMsg = errMsg + "Please enter a card number starting with 51 to 55\n"
			result = false;
		}
	} 

	else if (card_type == "American Express") { //if card_type value is AmericanExpress, validate the card_number value
		if(!card_number.match(/^[0-9]{15}$/)){
			errMsg = errMsg + "Please enter a card number of 15 digits\n"
			result = false; 
		} else if (!(card_number_sub === "35" || card_number_sub === "37")) {
			errMsg = errMsg + "Please enter a card number starting with 35 or 37\n"
			result = false;
		}
	} 
	

	if (!card_holder.match(/^[A-Za-z ]{1,40}$/)) {
		errMsg = errMsg + "Please enter a name with less than 40 characters\n"
		result = false; 
	}

	if (!card_expiry.match(/^0[1-9]|1[0-2]\/[2-9][0-9]$/)) {
		errMsg = errMsg + "Please enter a valid expiry date in mm/yy\n"
		result = false;
	}

	if (!cvv.match(/^[0-9]{3}$/)) {
		errMsg = errMsg + "Please enter a CVV using 3 digits only\n"
		result = false;
	}
	*/

	if (errMsg != "") {
		alert(errMsg);
	}
	return result; 
}

//store the bike feature values into the localStorage
function storeFeature(wheels, breaks, seat, handles, other) {

	localStorage.setItem("wheels", wheels);
	localStorage.setItem("breaks", breaks);
	localStorage.setItem("seat", seat);
	localStorage.setItem("handles", handles);
	localStorage.setItem("other", other);
}

//store the validated values of each input into the localStorage
function saveEnquireInfo(first_name, last_name, email_address, street_address, suburb, state, postcode, phone_number, radios, bike_type, description, quantity) {

	if(typeof(Storage) !=="undefined"){
		for (var i = 0, length = radios.length; i < length; i++) {
	  		if (radios[i].checked) {
	   			localStorage.setItem("preferred_contact", radios[i].value);
	   			break;
	   		}
  		}
  		localStorage.setItem("first_name", first_name);
		localStorage.setItem("last_name", last_name);
		localStorage.setItem("email_address", email_address);
		localStorage.setItem("street_address", street_address);
		localStorage.setItem("suburb", suburb);
		localStorage.setItem("state", state);
		localStorage.setItem("postcode", postcode);
		localStorage.setItem("phone_number", phone_number);
		localStorage.setItem("bike_type", bike_type);
		localStorage.setItem("description", description);
		localStorage.setItem("quantity", quantity);


	}

}

//display the localStorage values into the corresponding input fields in payment.html	
function get_enquiry_info() {
	if (typeof(Storage)!=="undefined"){ 
		if (localStorage.getItem("first_name") !== null){ //check to see if local storage is working using a test value
			document.getElementById("full_name").value = localStorage.getItem("first_name") + " " + localStorage.getItem("last_name"); //concatenate first_name and last_name
			document.getElementById("email_address").value = localStorage.getItem("email_address");	 
			document.getElementById("street_address").value = localStorage.getItem("street_address");
			document.getElementById("suburb").value = localStorage.getItem("suburb");
			document.getElementById("state").value = localStorage.getItem("state");
			document.getElementById("postcode").value = localStorage.getItem("postcode");
			document.getElementById("phone_number").value = localStorage.getItem("phone_number");
			document.getElementById("preferred_contact_val").value = localStorage.getItem("preferred_contact");
			document.getElementById("bike_type").value = localStorage.getItem("bike_type");
			document.getElementById("concern").value = localStorage.getItem("description");
			document.getElementById("quantity").value = localStorage.getItem("quantity");
			var wheels=localStorage.getItem("wheels");
			var breaks=localStorage.getItem("breaks");
			var seat=localStorage.getItem("seat");
			var handles=localStorage.getItem("handles");
			var other =localStorage.getItem("other");
            
			//if the option is checked (true), then enter it into the input field in payment.html
            if (wheels==="true") document.getElementById("feature").value += "Wheels, ";
            if (breaks==="true") document.getElementById("feature").value += "Breaks, ";
            if (seat==="true") document.getElementById("feature").value += "Seat, ";
            if (handles==="true") document.getElementById("feature").value += "Handles, ";
            if (other==="true") document.getElementById("feature").value += "Other";
			
		} else { //if local storage not working
			console.log("Cannot retrieve data from localStorage");
		}
	}
}

function clearBikeChoice(){
	localStorage.removeItem('chosenBike');
}

//called when the cancel order button is clicked, clears the localStorage and redirects to the homepage
function clearStorage(){
	localStorage.clear();
	location.href="index.php";
}

//called when page opens and calls the validation methods
function init() {
	if (document.getElementById("enquireForm")!= null) {
		clearBikeChoice();
	    document.getElementById("enquireForm").onsubmit = validateEnquire;
	} else if (document.getElementById("paymentForm")!=null) {
		get_enquiry_info(); 
		document.getElementById("paymentForm").onsubmit = validatePayment;
		document.getElementById("cancelOrder").onclick = clearStorage;
	} 
	else if (document.getElementById("fix_order_form")!=null){
		clearBikeChoice();
		// document.getElementById("fix_order_form").onsubmit = validateEnquire;
		// get_enquiry_info(); 
		// document.getElementById("fix_order_form").onsubmit = validatePayment;
	}
}

window.addEventListener("load",init);