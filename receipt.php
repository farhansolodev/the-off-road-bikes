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
    <title> Bicycle Hire Receipt Page </title>
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>

<body>
    <?php
        include("./includes/header.inc");
    ?>
    <div class="enquiry_flex">
        <div class="enquiry_info">
            <ul class="breadcrumb">
                <li><a href="index.php">Index</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="enquire.php">Enquiry</a></li>
            </ul>

            <h1 class="manager_heading">Order Receipt</h1>
            <?php
                if (!isset($_GET["db_msg"])) {
                    header("location:enquire.php"); //go back to enquire.php if the user reaches here through the browser
                    exit();
                } else {
                    echo $_GET["db_msg"]; //else show an error that getting the table failed
                }
            ?>
        </div>
    </div>
        <h3 id="receipt_info">Above is the receipt containing all the relevant information about your order. Thanks for ordering from us!</h3>
    <?php
        include("./includes/footer.inc");
    ?>
</body>

</html>