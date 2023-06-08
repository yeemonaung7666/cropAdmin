<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

// echo $url;  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Statistical Reporting System for Cultivation and Production of Crops in Ayeyarwaddy</title>
    
    <link rel="stylesheet" href="<?php echo $root?>style.css">

    <!--bootstrap cdn link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!--bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" 
    integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">

    <!-- bootstrap font awsome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css"
     integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">

    

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

    <!-- jquery toastar cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    
    <script src="alert.js"></script>

       
</head>

<body>

       

    <!-- top bar -->
    <div class="top">
        <div class="top_img">
            <img src="<?php echo $root?>images/Capture-1.PNG" alt="">
        </div>
        <h1><span class="space">a</span>A Statistical Reporting System for Cultivation <br> <span> And Production of Crops in Ayeyarwaddy Division</span></h1>
        <div class="top_img">
            <img src="<?php echo $root?>images/Capture.PNG" alt="">
        </div>
    </div>
    <!-- top bar end -->
    <!-- notification start -->
    <div class="notification">
        <div class="admin">
            <h6>Warmly Welcome, <span><?php echo $_SESSION['admin']->name;?> <a href="<?php echo $root_eng?>create_acc.php"> <i class="bi bi-person-plus-fill admin_icon" ></i> </a> </span></h6>
        </div>
        
    </div>
    
    <!-- notification end -->

    <!-- Navbar Start -->
    <div class="row">
        <div class="col-md-12">
        <div class="nav">
            <ul class="nav justify-content-center">

            <?php

            //home
                if($url == "http://localhost:100/cropAdmin/index.php" OR $url == "http://localhost:100/cropAdmin/"){
                    echo "<li class='active'><a href=$root>Home</a></li>";
                }
                else{
                    echo "<li><a href=$root>Home</a></li>";
                }
            //information
                if($url == "http://localhost:100/cropAdmin/english/information.php"){
                    echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/information.php' >Crops Information</a></li>";
                }
                else{
                    echo "<li><a href='http://localhost:100/cropAdmin/english/information.php' >Crops Information</a></li>";
                }

            //list
            if($url == "http://localhost:100/cropAdmin/english/list.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/list.php' >Crops List</a></li>";
            }else
                if($url == "http://localhost:100/cropAdmin/english/list20.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/list.php' >Crops List</a></li>";
            }else
                if($url == "http://localhost:100/cropAdmin/english/list22.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/list.php' >Crops List</a></li>";
            }
            else{
                echo "<li><a href='http://localhost:100/cropAdmin/english/list.php' >Crops List</a></li>";
            }

            //rating
            if($url == "http://localhost:100/cropAdmin/english/rating.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/rating.php' >Yearly Production</a></li>";
            }
            else{
                echo "<li><a href='http://localhost:100/cropAdmin/english/rating.php' >Yearly Production</a></li>";
            }
        

            //statistics
            if($url == "http://localhost:100/cropAdmin/english/statistics.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/statistics.php' >Statistics</a></li>";
            }
            else{
                echo "<li><a href='http://localhost:100/cropAdmin/english/statistics.php' >Statistics</a></li>";
            }
        

            //Content
            if($url == "http://localhost:100/cropAdmin/english/content.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/content.php' >Content</a></li>";
            }
            else{
                echo "<li><a href='http://localhost:100/cropAdmin/english/content.php' >Content</a></li>";
            }

            //comment
            if($url == "http://localhost:100/cropAdmin/english/recommend.php"){
                echo "<li class='active'><a href=' http://localhost:100/cropAdmin/english/recommend.php' >See Recommendations</a></li>";
            }
            else{
                echo "<li><a href='http://localhost:100/cropAdmin/english/recommend.php' >See Recommendations</a></li>";
            }
            ?>

            <li><a href="<?php echo $root?>logout.php">Logout</a></li>          
            </ul>
        </div>
        </div>
    </div>
    <!-- Navbar End -->