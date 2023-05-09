<?php 

  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location:adminLogin.php");
    exit;
  }

  include "partials/_dbconnect.php";
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
                <li><a href="CustomerData.php">
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
                <li><a href="changePassword.php">
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
                    <span class="text">Customer Feedback</span>
                </div>
                <div class="boxes">
                    
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">srno</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <!-- <th scope="col">actions</th> -->
    </tr>
  </thead>
  <tbody>
<!-- displaying title n desc in table -->
  <?php 
  $srno=1;

        $sql = "SELECT `name`, `email`, `subject`, `message` FROM `contact` ";
    $result = mysqli_query ($conn , $sql);
    while($row = mysqli_fetch_assoc($result)) {
      echo " <tr>
      <th scope='row'>". $srno ."</th>
      <td>". $row['name']. "</td>
      <td>". $row['email'] ."</td>
      <td>". $row['subject'] ."</td>
      <td>". $row['message'] ."</td>
 
    
    </tr> "; 
    
      $srno+=1;
    }

 ?>
   

  </tbody>
</table>
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


<!-- 
<td> 
      <span style='background-color: var(--primary-color);
      border-radius: 6px;
      color: var(--title-icon-color);
      width: 19px;
      justify-content: center;
      align-items: center;
      text-align: center;  margin-left: 36px; padding: 5px;'> <a title='Delete' href='delete-process.php?email=".$row['email']."' style='color: white;' > <i class='uil-archive-alt' class='delete'> </i> </a> </span>
    
      </td> -->