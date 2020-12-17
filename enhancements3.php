<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
	<meta name="description" content="Assignment 3 Enhancements"/>
	<meta name="viewport" content="width=device-width initial-scale=1"> 
	<meta name="keywords" content="Bicycle Hire, Enhancements, Javascript"/>
	<meta name="author" content="Ahsan Khan"  />
	<link href="styles/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title> Javascript Enhancements </title>
</head>

<body>

<h1> Enhancements 3 </h1>

<article class="enhancement_info">
<h2> Intuitive dropdown </h2>
<p> Before the enhancement, I used a link for each order but the issue with that is the user is only able to change one order_status at a time and I needed another page to make it work. While it was functional it was not very intuitive to have a whole new page just for one dropdown. This was why I decided to implement dynamic dropdowns.
When a new order is created, a new dropdown is added as well along with the ability to update the order status. This allows users to update multiple records at once without having to leave the page.</p>
<p>When the MySQL table is loaded, the while loop creates an additional column that adds a dropdown select input for the created order: </p>
<img src="images/manager code.png"></img>
<p>There was an issue where the dropdown didn't know which record it belonged to so I stored it in a hiddden input which stored the order_id for that particular order in an array:</p>
	<p><strong>&lt;input type=hidden name='hidden_order_id[]' value='".$record['order_id']."'&gt;</strong></p>
<p>After that, I used a foreach loop to iterate over every instance of the dropdown (since they're just the same element being repeated) and used that stored order_id to create a query for each dropdown individually.</p>
<img src="images/manager code2.png"></img>
<p>As you can see in the code above, there is an if-else statement that checks if the value passed from the dropdown is 'UPDATE_SELECTED'. This was done to bypass the default behavior of the selected value in the dropdown not being saved when the page is updated.</p>
<p>Sources: https://www.youtube.com/watch?v=YTBbx4qOKsQ (I used the logic from the deleting records functionality to help with making this functionality)</p>
<a href="manager.php">Link to the enhancement</a>
</article>

<article class="enhancement_info">
<h2> Allowing for multiple queries at once </h2>
<p>Before the enhancement, the user was unable to do multiple queries at once and this limited the number of relevant results the user can narrow down to. The user was only able to do one query at a time.</p>
<img src="images/manager code3.png"></img>
<p>As shown in the code above, I used an if-else function and the ability to concatenate the queries together to modify the queries based on the user's inputs.</p>
<p>Source: https://stackoverflow.com/questions/15702898/php-concatenate-names-and-update-sql-field (This helped in unerstanding the concatenation process)</p>
<a href="manager.php">Link to the enhancement</a>
</article>

</body>
</html>