<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Assignment 1 Website" />
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta name="keywords" content="Bicycle Hire, About-Us Page" />
    <meta name="author" content="Ahsan Khan" />
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title> Bicycle Hire About-Us Page </title>
</head>

<body>
	<?php
     		include("./includes/header.inc");  
	?>

    <div class="enquiry_flex">
        <div class="enquiry_bg">
            <img class="enquiry_bg" src="images/enquiry_bg.jpg" alt="enquiry_bg">
            <!-- https://www.itl.cat/wallview/iomxmR_bicycle-art-wallpapers-hd-resolution-is-4k-wallpaper/ -->
        </div>
        <div class="enquiry_info">
            <ul class="breadcrumb">
                <li><a href="index.php">Index</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="enquire.php">Enquiry</a></li>
                <li><a href="about.php">About-Us</a></li>
            </ul>

            <h1 class="enquiry_heading">About-Us (Me) </h1>
            <figure><img class="my_photo" src="images/my_photo.png" alt="my_photo"></figure>
        </div>
        <div id="info_area">
            <dl class="personal_information">
                <dt>My Name:</dt>
                <dd>Ahsan Nawab Khan</dd>
                <dt>Student ID:</dt>
                <dd>102890193</dd>
                <dt>Course:</dt>
                <dd>Bachelor of Computer Science</dd>
                <dt>Email:</dt>
                <dd><a href="102890193@student.swin.edu.au">102890193@student.swin.edu.au</a></dd>
            </dl>
        </div>
        <h1 class="timetable_heading"> My class timetable </h1>
        <div class="timetable">
            <table>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
                <tr>
                    <td>8:30 am - 10:30 am</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Networks and Switching Lecture</td>
                </tr>
                <tr>
                    <td>12:30 pm - 2:30 pm</td>
                    <td></td>
                    <td>Intro To Programming Lecture</td>
                    <td>Computer & Logic Essentials Lecture</td>
                    <td></td>
                    <td>Intro To Programming Workshop</td>
                </tr>
                <tr>
                    <td>2:30 pm - 4:30 pm</td>
                    <td>Creating Web Apps Lecture</td>
                    <td></td>
                    <td></td>
                    <td>Computer & Logic Essentials Tutorial</td>
                    <td>Intro To Programming Lab</td>
                </tr>
                <tr>
                    <td>4:30 pm - 6:30 pm</td>
                    <td></td>
                    <td>Creating Web Apps Lab</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5:30 pm - 8:30 pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Networks and Switching Lab</td>
                    <td></td>
                </tr>
            </table>
            <h2><a href="enhancements.php"> Enhancements Page </a></h2>
        </div>

    </div>



    <?php
	include("./includes/footer.inc");
    ?>

</body>

</html>