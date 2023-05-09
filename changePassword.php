<?php 

  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location:adminLogin.php");
    exit;
  }

  include "partials/_dbconnect.php";
?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {  
        // echo "button submit";
        include 'partials/_dbconnect.php';
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];        
        $username = $_SESSION['username'];
       
        if( $password == $cpassword ) {
            $hash = password_hash($password , PASSWORD_DEFAULT);

            $sql = "UPDATE `user` SET `password`='$hash'  WHERE `username`='$username' ";
            $result = mysqli_query($conn,$sql);
            if($result){
                // $showAlert = true;
                echo "<script> alert('password changed successfullly')  </script>";
            }
        }
        // elseif($num>0){
        //     $showError = "Username already exists try using other usrename";
        // }
        else{
        //   $showError = "Password do not match";
        echo "<script> alert('password do not match')  </script>";
            
        }
       
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="css/styleDashboard.css">
     

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- modal  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <title>Spice up restaurent</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="img/hero.png" style="height: 75px; width:75px" alt="">
            </div>
            <span class="logo_name">Spice Up Restaurent</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="adminDashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="todayBooking.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Today's Booking</span>
                </a></li>
                <li><a href="customerData.php">
                    <i class="uil-user"></i>
                    <span class="link-name">Customer Data</span>
                </a></li>
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="update_form.php">
                    <i class="uil-notes"></i>
                    <span class="link-name">Update Profile</span>
                </a></li>
                <li><a href="#">
                    <i class="uil-key-skeleton"></i>
                    <span class="link-name">Change Password</span>
                </a></li>
                <li><a href="contact_Us.php">
                <i class='uil-arrow-up-right'></i>
                    <span class="link-name">Customer Feedback</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="/restoran-1.0.0/logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search" style="color:rgb(14, 15, 15)"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Change Password</span>
                </div>
                <div class="boxes">




                <div class="container">
      <div
        class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information"
      >


      <!-- upass change form  -->

        <?php 
      
        
        echo "        
<form action='changePassword.php' method='POST'>
    <h3 class='text-center'>Change Password</h3>
    <div class='row'>
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class='form-group'>
          <label class='profile_details_text'>New Password: </label>
          <input
            type='password'
            name='password'
            class='form-control'
            value=''
            required
          />
        </div>
      </div>
    </div>
    <div class='row'>
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class='form-group'>
          <label class='profile_details_text'>Confirm Password:</label>
          <input
            type='cpasswprd'
            name='cpassword'
            class='form-control'
            value=''
            required
          />
        </div>
      </div>
    </div>
    
    <div class='row'>
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 submit'>
        <div class='form-group'>
          <input type='submit' class='btn btn-success' value='Submit' />
        </div>
      </div>
    </div>
  </form>";

  ?>
  </div> </div>




                </div>
            </div>
            </div>
        </div>
    </section>




<!-- data table  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
      
      <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
  
    <script src=" //cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js  "></script>
  <script src="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
    
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script src="js/script.js"></script>
</body>
</html>