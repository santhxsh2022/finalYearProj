<?php 
	$con=new mysqli("localhost","root","","project");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wings Engineering - Electrical Goods</title>
    <link rel="stylesheet" href="stylesWings.css">
    <script src="script.js" defer></script>
</head>
<body>

    <header>
        <div class="header-left">
            <button onclick="toggleSidebar()" id="toggleButton" class="toggle-btn">
                <img id="toggleImage" src="menuicon.png" alt="Menu Icon">
            </button>
            <a href="index.html"><img id="companyLogo" src="wings.png" alt="Company Logo"></a>
        </div>
		<div class="header-right">
            <div class="header-icon">
                <a href="viewCart.php" class="cart-icon"><img src="cart-icon.png" alt="Cart Icon" height="40px" width="40px"></a>
                 <!--  <span class="cart-count">0</span> You can update this dynamically with JavaScript -->
            </div>
            <div class="header-icon">
                <a href="login.html" class="profile-icon"><img src="profile-icon.png" alt="Profile Icon" height="40px" width="40px"></a>
            </div>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <a href="index.html">Home</a>
        <div class="sidebar-parent">
            <a href="product1.php" class="parent">Products</a>
            <ul class="productsSub">
                <li>Armoured Cables</li>
                <li>Industrial Cables</li>
                <li>Core Cables</li>
            </ul>
        </div>
        <a href="aboutus.html">About Us</a>
        <a href="contactus.html">Contact</a>
		<div class="login-menu">
            <a href="login.html">Login</a>
        </div>
    </div>

    <div class="content" id="content">
    </div>

    <div class="section2">
        <div class="container">
		 <?php 
            $sql="select * from sec1";
            $res=$con->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                        echo '
		
											<!-- Item 1: Copper Cables -->
								<a href="vieew.php?id='. $row['PID'] .'" class="items">
									<div class="img img1"><img src="'. $row['PIC'] .'" alt="Copper"></div>
									<div class="name">'. $row['PNAME'] .'</div>
									<div class="price">&#8377;'. $row['PRICE'] .'</div>
									<div class="info">'. $row['DES1'] .'</div>
								</a>
							        
							';
                }
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Wings Engineering. All rights reserved.</p>
    </footer>

</body>
</html>
