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
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
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




        <?php 
        $sql1 = "SELECT COUNT(*) FROM booktable where date = curdate() ";
        $result1 = mysqli_query($conn,$sql1);
        $row1 =  mysqli_fetch_assoc($result1);

        $sql2 = "SELECT COUNT(*) FROM booktable";
        $result2 = mysqli_query($conn,$sql2);
        $row2 =  mysqli_fetch_assoc($result2);

        $sql3="SELECT count(*) FROM booktable where `date` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
        $result3 = mysqli_query($conn,$sql3);
        $row3 =  mysqli_fetch_assoc($result3);
        $monthlyUser = $row3['count(*)'];
        $totalUser = $row2['COUNT(*)'];

        $repeatRate = $monthlyUser/$totalUser *100;   // last month customer/total customer *100
        ?>


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <img src="img/booking.jpg" style="height: 200px; width:200px">
                        <span class="text">Total bookings today</span>
                        <span class="number">  <?php echo $row1['COUNT(*)']; ?>  </span>
                    </div>
                    <div class="box box2">
                        <img src="img/customer.png" style="height: 200px; width:200px">
                        <span class="text"> Total Customers Served</span>
                        <span class="number"> <?php echo $row2['COUNT(*)']; ?>+</span>
                    </div>
                    <div class="box box3">
                        <img src="img/repeatCustomer.jpg" style="height: 200px; width:200px">
                        <span class="text">Monthly Repeat Customer Rate</span>
                        <span class="number"><?php echo $repeatRate ;?>%</span>
                    </div>
                </div>
            </div>
            <!-- <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Highest Offers</span>
                </div>
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Students Name</span>
                        <span class="data-list">Prem Shahi</span>
                        <span class="data-list">Deepa Chand</span>
                        <span class="data-list">Manisha Chand</span>
                        <span class="data-list">Pratima Shahi</span>
                        <span class="data-list">Man Shahi</span>
                        <span class="data-list">Ganesh Chand</span>
                        <span class="data-list">Bikash Chand</span>
                    </div>
                    <div class="data email">
                        <span class="data-title">Company</span>
                        <span class="data-list">Byjus</span>
                        <span class="data-list">Uber</span>
                        <span class="data-list">Adobe</span>
                        <span class="data-list">Netflix</span>
                        <span class="data-list">Amazon</span>
                        <span class="data-list">Salesforce</span>
                        <span class="data-list">Civo</span>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Package(LPA)</span>
                        <span class="data-list">17</span>
                        <span class="data-list">15</span>
                        <span class="data-list">12</span>
                        <span class="data-list">12</span>
                        <span class="data-list">9</span>
                        <span class="data-list">9</span>
                        <span class="data-list">7</span>
                    </div>
                    <div class="data type">
                        <span class="data-title">Post</span>
                        <span class="data-list">Computer Programmer</span>
                        <span class="data-list">Big Data Engineer</span>
                        <span class="data-list">Software Systems Developer</span>
                        <span class="data-list">Computer Hardware Engineer</span>
                        <span class="data-list">Computer Support Specialist</span>
                        <span class="data-list">Devops Engineer</span>
                        <span class="data-list">SDE</span>
                    </div>
                    
                </div> -->
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>