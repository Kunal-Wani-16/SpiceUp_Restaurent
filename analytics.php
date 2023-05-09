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








  <!-- bar graph  -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Month', 'Total'],

          <?php  
            
            $sql = "SELECT monthname(date),COUNT(*) FROM booktable WHERE YEAR(date) = '2023' GROUP BY MONTH(date)";
           $result = mysqli_query($conn , $sql);
             $num = mysqli_num_rows($result);
            $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row = mysqli_fetch_assoc($result);
                 ?>
                ["<?php echo $row['monthname(date)']; ?>" ,"<?php echo $row['COUNT(*)']; ?>"],
               
                <?php
                $i=$i+1;
                }
            }

            ?>








        //   ["King's pawn (e4)", 44],
        //   ["Queen's pawn (d4)", 31],
        //   ["Knight to King 3 (Nf3)", 12],
        //   ["Queen's bishop pawn (c4)", 10],
        //   ['Other', 3]
        ]);

        var options = {
          title: 'Monthly Customers: Year 2023',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Monthly Customer: Year 2023',
                   subtitle: 'Total customer vs Month' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>

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
                <li><a href="#">
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
                    <span class="text">Analytics</span>
                </div>
                <div class="boxes">





  
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  





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