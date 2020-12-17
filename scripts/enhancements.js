/**
* Author: Ahsan 102890193
* Target: enquire.php, payment.php
* Purpose: allowing for button data transfer, 
* Created: 4/25/2020
* Last updated: 4/4/2020
* Credits: 
*/

"use strict" 

//store the bike data when the user clicks on a button
function saveBikeChoice(){
    var bikeDivs = document.getElementsByClassName("similar_flex")[0].children; //gets the child element data of the div and stores it in a variable
	    var bike0 = bikeDivs[0].children[0]; 
	    bike0.addEventListener("click", function(){ //when the button is clicked, create an object variable that stores its particular values 
			var chosenBike = 
			{
				name:"EuroSmith 2016 MTB",
				price:"159.99"
			}
			localStorage.setItem("chosenBike",JSON.stringify(chosenBike)); //stringify the stored value and store that into the localStorage
			if (document.getElementById("fix_order_form")!=null) {
				getFixedBikeChoice();
			}
		});
	    var bike1 = bikeDivs[1].children[0];
	    bike1.addEventListener("click", function(){
			var chosenBike = 
			{
				name:"ADL 2012 MTB",
				price:"219.99"
			}
			localStorage.setItem("chosenBike",JSON.stringify(chosenBike));
			if (document.getElementById("fix_order_form")!=null) {
				getFixedBikeChoice();
			}
		});
	    var bike2 = bikeDivs[2].children[0];
	    bike2.addEventListener("click", function(){
			var chosenBike = 
			{
				name:"Nashbar AT2 MB",
				price:"89.99"
			}
			localStorage.setItem("chosenBike",JSON.stringify(chosenBike));
			if (document.getElementById("fix_order_form")!=null) {
				getFixedBikeChoice();
			}
		});
	    var bike3 = bikeDivs[3].children[0];
	    bike3.addEventListener("click", function(){
			var chosenBike = 
			{
				name:"SmithWeson 2012 RT",
				price:"59.99"
			}
			localStorage.setItem("chosenBike",JSON.stringify(chosenBike));
			if (document.getElementById("fix_order_form")!=null) {
				getFixedBikeChoice();
			}
		});
	    var bike4 = bikeDivs[4].children[0];
	    bike4.addEventListener("click", function(){
			var chosenBike = 
			{
				name:"Marooned 2019 SB",
				price:"174.99"
			}
			localStorage.setItem("chosenBike",JSON.stringify(chosenBike));
			if (document.getElementById("fix_order_form")!=null) {
				getFixedBikeChoice();
			}
		});
}

//transfers the bike choice data to payment.html
function getBikeChoice(){
    var bike = JSON.parse(localStorage.getItem("chosenBike")); //parse the value into two values e.g.["Marooned 2019 SB", "174.99"]
    var name = Object.values(bike)[0]; //get the first value and store it into a variable
    var price = Object.values(bike)[1];
    var actual_price = parseFloat(price); //parse the price value from string to float
    var quantity = localStorage.getItem("quantity"); //gets the quantity value from localStorage
    var actual_quantity = parseFloat(quantity);

    var total_price = actual_price * quantity; //calculate the total price by bike price multiplied with the quantity
    var final_price = total_price.toFixed(2); //round the total_price value to 2 decimal places
    
    document.getElementById("bikename").textContent = name; //change the text content to the corresponding stored values
    document.getElementById("bikeprice").textContent = "USD:\n$"+final_price;
    document.getElementById("hidden_bikename").value = name; 
    document.getElementById("hidden_bikeprice").value = final_price;
    document.getElementById("hidden_actual_price").value = actual_price;
}

function getFixedBikeChoice(){
	var bike = JSON.parse(localStorage.getItem("chosenBike")); //parse the value into two values e.g.["Marooned 2019 SB", "174.99"]
	var name = Object.values(bike)[0]; //get the first value and store it into a variable
	var price = Object.values(bike)[1];
	var actual_price = parseFloat(price); //parse the price value from string to float
	var quantity = localStorage.getItem("quantity"); //gets the quantity value from localStorage
	var actual_quantity = parseFloat(quantity);
    
	var total_price = actual_price * quantity; //calculate the total price by bike price multiplied with the quantity
	var final_price = total_price.toFixed(2); //round the total_price value to 2 decimal places
	
	document.getElementById("hidden_bikename").value = name;
	document.getElementById("bike_name").textContent = "Chosen bike: "+name; 
	document.getElementById("hidden_actual_price").value = actual_price;
	document.getElementById("actual_price").textContent = "Price: $"+actual_price;
}

//display an alert when timer runs out and redirect to homepage
function redirect() {
	alert("Sorry, you have taken too long to submit the form. You will be redirected to the homepage");
	window.location = "index.php";
}

function enhancement_init() {
	if (document.getElementById("enquireForm")!= null) {
		saveBikeChoice();
	} else if (document.getElementById("paymentForm")!=null) {
		getBikeChoice();
		//sets a timer when the page opens for 20 minutes and then calls the redirect function
		setTimeout('redirect()', 1200000);
	} else if (document.getElementById("fix_order_form")!=null) {
		saveBikeChoice();
	}
}

window.addEventListener("load",enhancement_init);