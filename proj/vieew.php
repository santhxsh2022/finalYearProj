<?php 
	$con=new mysqli("localhost","root","","project");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - Wings Engineering</title>
    <link rel="stylesheet" href="stylesWings.css">
</head>
<body>
    <header>
        <div class="header-left">
            <button onclick="toggleSidebar()" id="toggleButton" class="toggle-btn">
                <img id="toggleImage" src="menuicon.png" alt="Menu Icon">
            </button>
            <a href="index.html"><img id="companyLogo" src="wings.png" alt="Company Logo"></a>
			<div class="header-right">
            <div class="header-icon">
                <a href="viewCart.php" class="cart-icon"><img src="cart-icon.png" alt="Cart Icon" height="40px" width="40px"></a>
                 <!--  <span class="cart-count">0</span> You can update this dynamically with JavaScript -->
            </div>
            <div class="header-icon">
                <a href="login.html" class="profile-icon"><img src="profile-icon.png" alt="Profile Icon" height="40px" width="40px"></a>
            </div>
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
    </div>
	 <?php 
          if(isset($_POST["addCart"])){
            if(isset($_SESSION["cart"]))
            {
              $pid_array=array_column($_SESSION["cart"],"pid");
              if(!in_array($_GET["id"],$pid_array))
              {
                $index=count($_SESSION["cart"]);
                $item=array(
                  'pid' => $_GET["id"],
                  'pname' => $_POST["pname"],
                  'price' => $_POST["price"],
                  'qty' => $_POST["qty"]
                );
                $_SESSION["cart"][$index]=$item;
                  echo "<script>alert('Product Added..');</script>";
                header("location:viewCart.php");
              }
              else
              {
                echo "<script>alert('Already Added..');</script>";
              }
            }
            else
            {
                $item=array(
                  'pid' => $_GET["id"],
                  'pname' => $_POST["pname"],
                  'price' => $_POST["price"],
                  'qty' => $_POST["qty"]
                );
                $_SESSION["cart"][0]=$item;
                echo "<script>alert('Product Added..');</script>";
                header("location:viewCart.php");
            }
          }

            $sql="select * from sec1 where pid='{$_GET["id"]}'";
            $res=$con->query($sql);
            if($res->num_rows>0) 
            {
                echo '<form action="'.$_SERVER["REQUEST_URI"].'" method="post">';
                if($row=$res->fetch_assoc())
                {
                  echo  '

						<div class="content" id="content">
							<div class="product-container">
								<!-- Product Image -->
								<div class="product-image">
									<img src="'. $row['PIC'] .'" alt="Copper wire image" height="225px" width="225px">
									<p>&#8377;'. $row['PRICE'] .'</p> <!-- Product Price -->
								</div>

								<!-- Product Details -->
								<div class="product-details">
									<h1>Copper Wire</h1>
									<div class="ratings">
										<!-- Rating stars or rating number can go here -->
										<p>Ratings: 4.5/5</p>
									</div>
									<div class="reviews">
										<!-- Reviews or link to reviews page can go here -->
										<p>Reviews: 1000+</p>
									</div>
									<div class="description">
										<!-- Product Description -->
										<h2>Description:</h2>
										<p>'. $row['DES'] .'</p>
									</div>
									<div class="manufacturer">
										<!-- Manufacturer details -->
										<h2>Manufacturer:</h2>
										<p>'. $row['MANU'] .'</p>
									</div>
									<div class="seller">
										<!-- Seller details -->
										<h2>Seller:</h2>
										<p>'. $row['SEL'] .'</p>
									</div>
									<!-- Additional Product Details -->
											<div class="other-details">
												<h2>Additional Details:</h2>
												<ul>
													<li>Dimensions: 10cm x 10cm x 20cm</li>
													<li>Weight: 500g</li>
													<li>Material: Copper</li>
													<li>Available Colors: Gold, Silver</li>
													<li>Warranty: 1 Year</li>
												</ul>
											</div>
											<input type="number"  placeholder="Enter Qty" name="qty"  >
											<p><input type="hidden"  name="pname" value="'. $row['PNAME'] .'" class="form-control"></p>
											<p><input type="hidden"  name="price" value="'. $row['PRICE'] .'" class="form-control"></p>
											<button class="submit-button" type="submit" name="addCart" >Add to Cart</button>
											<br>
											<!-- Share Buttons -->
														<div class="share-buttons">
															<p>Share:</p>
															<a href="#" onclick="shareOnFacebook()">Facebook</a>
															<a href="#" onclick="shareOnTwitter()">Twitter</a>
															<a href="#" onclick="copyURL()">Copy URL</a>
														</div>
											</div>
									</div><br>
			';
            }
            echo '</form>';
          }
        
        
		?>
		
		<section id="form-details">
        <form action="contact.php" method="post">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" name="name" placeholder="Your Name">
            <input type="text" name="email" placeholder="E-mail">
            <textarea name="msg" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>
    </section>

        <!-- Related Products Section -->
        <div class="related-products">
            <h2>Related Products</h2>
            <div class="rel-product">
                <a href="page10.html"><img src="ht_lt_jointing_kits.jpg" alt="ht_lt_jointing_kits" height="150px" width="150px"></a>
                <h3>HT LT Jointing Kits</h3>
                <p>&#8377;3000</p>
                <button class="cta-button">Add to Cart</button>
            </div>
            <div class="rel-product">
                <a href="page11.html"><img src="ht_para_tape_rolls.jpg" alt="ht_para_tape_rolls" height="150px" width="150px"></a>
                <h3>HT Para Tape Rolls</h3>
                <p>&#8377;1800</p>
                <button class="cta-button">Add to Cart</button>
            </div>
			<div class="rel-product">
                <a href="page12.html"><img src="volt_meters.jpg" alt="Volt Meter" height="150px" width="150px"></a>
                <h3>Volt Meters</h3>
                <p>&#8377;1000</p>
                <button class="cta-button">Add to Cart</button>
            </div>
			<div class="rel-product">
                <a href="page13.html"><img src="timer.jpg" alt="Timer" height="150px" width="150px"></a>
                <h3>Timer</h3>
                <p>&#8377;2200</p>
                <button class="cta-button">Add to Cart</button>
            </div>
			
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Wings Engineering. All rights reserved.</p>
    </footer>

    <script src="script.js" defer></script>

    <script>
        function requestQuote() {
            var quantity = document.getElementById("quantity").value;
            // Logic to request a quote with the specified quantity
            alert("Requesting a quote for " + quantity + " units. We'll contact you shortly.");
        }

        function shareOnFacebook() {
            // Logic to share on Facebook
            alert("Sharing on Facebook...");
        }

        function shareOnTwitter() {
            // Logic to share on Twitter
            alert("Sharing on Twitter...");
        }

        function copyURL() {
            // Logic to copy the URL
            alert("URL copied to clipboard.");
        }
    </script>
</body>
</html>