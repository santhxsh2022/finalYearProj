<?php 
	$con=new mysqli("localhost","root","","project");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Display</title>
    <link rel="icon" href="RES/Icons/icons8-warehouse-100.png" type="image/x-icon" />
    <link rel="stylesheet" href="view.css" />
  </head>
  <body bgcolor="#B4B4B8" style="color: rgb(0, 0, 0)">
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
                  <div class="container">
                    <div class="single-product">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-image">
                                    <div class="product-image-main">
                                        <img src="RES/'. $row['PIC'] .'" alt="" id="product-main-image" />
                                    </div>
                                    <div class="product-image-slider">
                                        <img src="RES/Src/'. $row['PIC'] .'" alt="" class="image-list" />
                                        <img src="RES/Src/'. $row['PIC1'] .'" alt="" class="image-list" />
                                        <img src="RES/Src/'. $row['PIC2'] .'" alt="" class="image-list" />
                                        <img src="RES/Src/'. $row['PIC3'] .'" alt="" class="image-list" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="breadcrumb">
                                    <span><a href="sk.html">Home</a></span>
                                    <span><a href="product.php">Product</a></span>
                                    <span class="active"> '. $row['BNAME'] .'</span>
                                </div>
                            <div class="product">
                                <div class="product-title">
                                    <h2>'. $row['PNAME'] .'</h2>
                                </div>
                                <div class="product-rating">
                                    <img src="star.png" alt="" />
                                    <img src="star.png" alt="" />
                                    <img src="star.png" alt="" />
                                    <img src="star.png" alt="" />
                                    <img src="star1.png" alt="" />
                                </div>
                                <div class="product-price">
                                    <span class="offer-price"> ₹'. $row['PRICE'] .'</span>
                                    <span class="sale-price"> ₹</span>
                                </div>

                                <div class="product-details">
                                    <h3>Description</h3>
                                    <p>
                                    '. $row['DES'] .'
                                    </p>
                                </div>
                                <p><input type="text"  placeholder="Enter Qty" name="qty"  ></p>
                                <p><input type="hidden"  name="pname" value="'. $row['PNAME'] .'" class="form-control"></p>
							                  <p><input type="hidden"  name="price" value="'. $row['PRICE'] .'" class="form-control"></p>
                                    <br /><br /><br /><br /><br />

                                <div class="product-btn-group">
                                    <div class="button buy-now">
                                        <i><img src="RES/Icons/rupee.png" alt="" /></i> Buy Now
                                    </div>
                                    <!-- <div class="button add-cart"><i><img src="RES/Icons/sidecart.png" alt="" /></i> Add to Cart</div> -->
                                    <button type="submit" name="addCart" class="button add-cart">
                                        <i><img src="RES/Icons/sidecart.png" alt="" /></i>Add to Cart
                                    </button>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    ';
            }
            echo '</form>';
          }
        
        
		?>
        
    <!--script-->
    <script src="view.js"></script>
  </body>
</html>
