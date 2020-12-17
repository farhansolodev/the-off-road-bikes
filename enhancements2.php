<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
	<meta name="description" content="Assignment 2 Enhancements"/>
	<meta name="viewport" content="width=device-width initial-scale=1"> 
	<meta name="keywords" content="Bicycle Hire, Enhancements, Javascript"/>
	<meta name="author" content="Ahsan Khan"  />
	<link href="styles/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title> Javascript Enhancements </title>
</head>

<body>

<h1> Enhancements 2 </h1>

<article class="enhancement_info">
<h2> Replacing Dropdown with Buttons and implementing the Javascript using Objects and JSON </h2>
<p> Before the enhancement, I used a dropdown select option for the <strong>product range</strong> but that has its limitations for it does not display the price information and images immediately. Changing to a range of buttons is also more user-friendly. To make the buttons functional, I needed to use use objects, eventListeners and JSON.</p>
<p>When a button is pressed, a range of data in the object variable is stored into a single variable and JSON is used to stringify that data into an array of characters and store it in the localStorage. Using JSON again, to parse the data into a readable form that is stored in an array.</p>
<p> The JSON stringify is done using: <strong>localStorage.setItem("chosenBike",JSON.stringify(chosenBike));</strong></p>
<p> The object is set using: <strong>var chosenBike = {name:"EuroSmith 2016 MTB",price:"159.99"}</strong></p>
<p> The JSON parsing is done using: <strong>var bike = JSON.parse(localStorage.getItem("chosenBike"));</strong>
<p>Sources: 1) https://www.w3schools.com/js/js_objects.asp </p>
<p>2) https://www.w3schools.com/js/js_json.asp </p>
<a href="enquire.php#similar_flex">Link to the enhancement</a>
</article>

<article class="enhancement_info">
<h2>Time limit to fill in the form</h2>
<p>When the user enters the payment.php page, a time limit of 20 minutes is set so the user only has a limited time to complete and submit the form.</p>
<p>If the timer reaches the 20 minute mark, an alert pops up showing that the user took too long to submit and redirects to the homepage.</p>
<p>I've used the setTimeout() function and it is immediately called when the payment page initializes. This function has parameters of a redirect function and 1200000 (20 minutes). When the timer reaches 1200000, the redirect function is called which also displays the alert.</p>
<p>Source:https://www.w3schools.com/jsref/met_win_settimeout.asp</p>
<a href="payment.php">Link to the enhancement</a>
</article>

</body>
</html>