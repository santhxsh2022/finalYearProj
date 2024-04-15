<?php 
	$con=new mysqli("localhost","root","","project");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
             text-decoration: none;
        }
    </style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="product.css" />
  <script src="sk.js"></script>
</head>
<body style="background-color: #B4B4B8" onload="startTime(),liveDate()">
    <h2 id="head">Selvi Electricals & Hardware Store</h2>
    
      <header>
        <ul style="background-color: #607274" id="navbar">
          <li>
            <a href="sk.html" style="text-decoration: none">HOME</a>
          </li>
          <li>
            <a href="product.html" style="text-decoration: none">Products</a>
          </li>
          <li>
            <a href="customer.html" style="text-decoration: none"
              >Customer Service</a
            >
          </li>
          <li>
            <input
              type="search"
              name="search"
              id="search"
              style="
                border-radius: 10px;
                border-width: 0.05;
                font-family: Adobe Hebrew;
              "
            />
          </li>
          <li onclick="window.location.href='viewCart.php';">
            <img src="RES/Icons/cart1.png" alt="" id="myImage" />
          </li>
        </ul>
      </header>
      <h1 style="font-family: Microsoft JhengHei;color: black;">Mechanical Tools</h1>
        <main class="container1" style="margin-top: 3px;margin:3%;">
        <section class="horizontal-section">
            <?php 
            $sql="select * from sec1";
            $res=$con->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                        echo '
                                
                                    <div class="card">
                                        <img src="RES/'. $row['PIC'] .'" alt="" width="250px" height="255px"/>
                                        <p><b>'. $row['BNAME'] .'</b></p>
                                        <a href="view1.php?id='. $row['PID'] .'" <p style="width: 250px;display: flex;color:black;"> '.$row['PNAME'].' </p></a>
                                        <p><b>Rs.'. $row['PRICE'] .'</b></p>
                                    </div>
                                    
                               
                        ';
                }
            }
            ?>
     
        </section>
        </main>
        <h1 style="font-family: Microsoft JhengHei;color: black;">Screws , Nails & Clamps</h1>
        <main class="container1" style="margin-top: 3px;margin:3%;">
        <section class="horizontal-section">
            <?php 
            $sql="select * from sec2";
            $res=$con->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                        echo '
                                
                                    <div class="card">
                                        <img src="RES/'. $row['PIC'] .'" alt="" width="250px" height="210px"/>
                                        <p><b>'. $row['BNAME'] .'</b></p>
                                        <a href="view2.php?id='. $row['PID'] .'"><p style="width: 250px;display: flex;color:black;"> '.$row['PNAME'].' </p></a>
                                        <p><b>Rs.'. $row['PRICE'] .'</b></p>
                                    </div>
                                    
                               
                        ';
                }
            }
            ?>
     
        </section>
        </main>
      <h1 style="font-family: Microsoft JhengHei;color: black;">
        Locks for Home & WorkPlaces
      </h1>
      <main class="container1" style="margin-top: 3px;margin:3%;">
        <section class="horizontal-section">
            <?php 
            $sql="select * from sec3";
            $res=$con->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                        echo '
                                
                                    <div class="card">
                                        <img src="RES/'. $row['PIC'] .'" alt="" width="250px" height="210px"/>
                                        <p><b>'. $row['BNAME'] .'</b></p>
                                        <a href="view3.php?id='. $row['PID'] .'"><p style="width: 250px;display: flex;color:black;text-decoration:none;"> '.$row['PNAME'].' </p></a>
                                        <p><b>Rs.'. $row['PRICE'] .'</b></p>
                                    </div>
                                    
                               
                        ';
                }
            }
            ?>
     
        </section>
        </main>   
        <br />
      <footer>
        <div style="margin-top: 2%; margin-left: 2%">
          &copy; 2020 All rights reserved. <br />
          Terms And Conditions.
        </div>
        <div class="center" style="margin-right: 2%">
          <p style="font-size: 20px">
            Follow Us <br />
            <a
              href="https://api.whatsapp.com/send/?phone=%2B917867993503&text&type=phone_number&app_absent=0"
              target="_blank"
            >
              <img
                src="RES/Icons/whatsapp-logo.png"
                alt="whatsapp Icon"
                width="30"
                height="30"
            /></a>
            <a
              href="https://www.instagram.com/marshaal_the_mr/?hl=en"
              target="_blank"
              ><img
                src="RES/Icons/instagram.ico"
                alt="instagram Icon"
                width="30"
                height="30"
            /></a>
            <a href="https://t.me/+91-7867993503" target="_blank"><img src="RES/Icons/telegram.png" alt="youtube icon" width="30" height="30" /></a>
          </p>
        </div>
      </footer>
      <hr style="background-color: #1c1d22" />
      <div id="time1">
        <p id="time"></p>
        <p id="date"></p>
      </div>
    </div>
  </body>
</html>
<script>
  var img = document.getElementById("myImage");
  img.addEventListener("click", function () {
    window.location = "#";
  });
</script>

