<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Assignment 2 Website" />
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta name="keywords" content="Bicycle Hire, Fix Order" />
    <meta name="author" content="Ahsan Khan" />
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title> Bicycle Hire Manager Page </title>
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>

<body>
    <?php
        include("./includes/header.inc");
    ?>
    <div class="enquiry_flex">
        <div class="enquiry_info">
            <h1 class="manager_heading">Admin Page</h1>
            <?php

                require_once "settings.php";
                $conn = mysqli_connect($host,$user,$pwd,$sql_db);

                //checks which rows are checked and creates a query to delete them 
                if(isset($_POST['delete_checkbox'])){ //checks if the checkbox is ticked
                    if ($conn){
                        $chkarr = $_POST['delete_checkbox'];
                        foreach($chkarr as $id){
                            $deleteResult = mysqli_query($conn,"DELETE from orders WHERE order_id=$id and order_status='PENDING'"); //Deletes the checked row only if it is PENDING
                            if (!$deleteResult){
                                echo "      <p>Orders table doesn't exist or delete operation was unsuccessful.</p>";
                            }
                        }
                    } else {
                        echo "<p>Unable to connect to the database.</p>";
                    }
                }

                if(array_key_exists('status',$_POST)){
                    if ($conn) {
                        //** ENHANCEMENT FOR ASSIGNMENT 3 */
                        $i=0;
                        $droparr = $_POST['status'];
                        $order_id = $_POST['hidden_order_id'];
                        foreach ($droparr as $status){
                            if($status=="UPDATE_STATUS"){
                                $i++;
                            } else {
                                $statusUpdateQuery = "UPDATE orders SET order_status='$status' WHERE order_id='$order_id[$i]'";
                                $statusUpdateResult = mysqli_query($conn, $statusUpdateQuery); //returns mysqli result object or boolean
                                if (!$statusUpdateResult){
                                    echo "<p>Orders table doesn't exist or update operation for order_id {$order_id} unsuccessful.</p>";
                                }
                                $i++;
                            }
                        }
                    } else {
                        echo "<p>Unable to connect to the database.</p>";
                    }
                }


                //** ENHANCEMENT FOR ASSIGNMENT 3 */
                if (!isset($_POST["fn"])&&!isset($_POST["prod"])&&!isset($_POST["sort"])&&!isset($_POST["pen"])){
                    $searchQuery="SELECT * FROM orders";
                } else if($_POST["fn"]==""&&$_POST["prod"]==""&&!isset($_POST["sort"])&&!isset($_POST["pen"])){
                    $searchQuery="SELECT * FROM orders";
                } else {
                    $fn=trim($_POST["fn"]);
                    $bikeName=trim($_POST["prod"]);
                    $searchQuery="SELECT * FROM orders WHERE full_name LIKE '%$fn%' and bike_name LIKE '%$bikeName%' ";
                    if (isset($_POST["pen"])){
                        $searchQuery.="and order_status='PENDING' ";
                    }
                    if(isset($_POST["sort"])){
                        $searchQuery.="ORDER BY order_cost DESC";
                    }
                }
                
                if ($conn) { // connected
                    $searchResult = mysqli_query($conn, $searchQuery);
        
                    if ($searchResult) {	//   search query was successfully executed
                        
                        $record = mysqli_fetch_array($searchResult);
                        if ($record) {		//   record exist
                            echo "<table class='managerTable'>";
                            echo "<tr><th>Order_Id</th><th>Fullname</th><th>Email</th><th>Street Address</th><th>Suburb</th>
                            <th>State</th><th>Post Code</th><th>Phone Number</th><th>Preferred Contact</th><th>Bike Type</th>
                            <th>Feature</th><th>Concern</th><th>Chosen Bike</th><th>Quantity</th><th>Card Type</th>
                            <th>Card Holder</th><th>Card Number</th><th>Card Expiry</th><th>CVV</th>
                            <th>Total Price</th>
                            <th>Date</th><th>Order Status</th>
                            <th><button type='submit' class='submission' form='statusForm' name='delete_btn' id='delete_btn'>Delete</button></th>
                            <th><p><button type='submit' class='submission' form='statusForm' name='save_changes_btn' id='save_changes_btn'>Save changes</button></th></tr>";
                            echo "<form action='manager.php' method='post' id='statusForm'>";
                            while($record){ 
                                //** PRINTS OUT 1 RECORD EVERY ITERATION */
                                echo "<tr><td class='order_id'>{$record['order_id']}</td>";
                                echo "<td>{$record['full_name']}</td>";
                                echo "<td>{$record['email_address']}</td>";
                                echo "<td>{$record['street_address']}</td>";
                                echo "<td>{$record['suburb']}</td>";
                                echo "<td>{$record['state_id']}</td>";
                                echo "<td>{$record['post_code']}</td>";
                                echo "<td>{$record['phone_number']}</td>";
                                echo "<td>{$record['preferred_contact']}</td>";
                                echo "<td>{$record['bike_type']}</td>";
                                echo "<td>{$record['feature']}</td>";
                                echo "<td>{$record['concern']}</td>";
                                echo "<td>{$record['bike_name']}</td>";
                                echo "<td>{$record['quantity']}</td>";
                                echo "<td>*****</td>";
                                echo "<td>*****</td>";
                                echo "<td>*****</td>";
                                echo "<td>*****</td>";
                                echo "<td>***</td>";
                                echo "<td>{$record['order_cost']}</td>";
                                echo "<td>{$record['order_time']}</td>";
                                echo "<td>{$record['order_status']}</td>";
                                echo "<td><input type='checkbox' name='delete_checkbox[]' id='delete_checkbox' value='".$record['order_id']."'/></td>";
                                                    
                                                //** ENHANCEMENT FOR ASSIGNMENT 3 */
                                echo 
                                    "<td>
                                        <select class='editStatus' name='status[]'id='status'>
                                            <option value='UPDATE_STATUS'>Update status</option>
                                            <option value='PENDING'>Pending</option>
                                            <option value='FULFILLED'>Fulfilled</option>
                                            <option value='PAID'>Paid</option>
                                            <option value='ARCHIVED'>Archived</option>
                                        </select>
                                        <input type=hidden name='hidden_order_id[]' value='".$record['order_id']."'/>
                                    </td></tr>";
                                $record = mysqli_fetch_assoc($searchResult);
                            }
                            echo "</form>";
                            echo "</table>";                   
                            mysqli_free_result ($searchResult);
                        } else {
                            echo "<p>No record retrieved.</p>";
                        }
                    } else {
                        echo "<p>Orders table doesn't exist or select query unsuccessful.</p>";
                    }
                    mysqli_close($conn);	// Close database connection
                } else {
                    echo "<p>Unable to connect to the database.</p>";
                }
            ?>
        </div>
    </div>
    <div class="search_heading" >
        <form action="manager.php" method="post" id="managerSearchForm">
            <p><label>Full Name: <input type="text" name="fn"></label></p>
            <p><label>Product: <input type="text" name="prod"></label></p>
            <p><label for="sort">Sort by total cost</label>
                <input type="checkbox" id="sort" name="sort" />
            </p>
            <p><label for="pending">Pending orders</label>
                <input type="checkbox" id="pending" name="pen" />
            </p>
            <input id="querySearchBtn" type="submit" value="Search">
        </form>
    </div>

    <?php
    include("./includes/footer.inc");
    ?>
</body>

</html>
