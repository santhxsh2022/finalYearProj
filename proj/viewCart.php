<?php
session_start();
$con = new mysqli("localhost", "root", "", "project");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="stylesWings.css">
  <style>
    /* Your custom CSS styles go here */
  </style>
</head>
<body>
  
<div class="container">
  <div class="row">
    <h1>Cart Items</h1><hr>
    <a href='product1.php'><img src="prods.png" height="40px", width="100px"></a>
    <table class='table'>  
      <tr>
        <th>Item Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        <th>Remove</th>
      </tr>
      <?php 
      if(isset($_GET["del"]) && isset($_SESSION['cart']) && is_array($_SESSION['cart']))
      {
        foreach($_SESSION["cart"] as $keys=>$values)
        {
          if($values["pid"]==$_GET["del"])
          {
            unset($_SESSION["cart"][$keys]);
          }
        }
      }
      if(isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart']))
      {
        $total = 0;
        foreach($_SESSION["cart"] as $keys=>$values)
        {
          $amt = (is_numeric($values["price"]) && is_numeric($values["qty"])) ? $values["price"] * $values["qty"] : 0;
          $total += $amt;
          echo "
          <tr>
            <td>{$values["pname"]}</td>
            <td>{$values["qty"]}</td>
            <td>{$values["price"]}</td>
            <td>{$amt}</td>
            <td><a href='viewCart.php?del={$values["pid"]}'>Remove</a></td>
          </tr>
          ";
        }
        echo "
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Total</td>
          <td>{$total}</td>
        </tr>
        ";
      }
      else
      {
        echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
      }
      ?>
    </table>
    <a href="checkout.html" class="btn btn-success">Proceed to Purchase</a>
  </div>
</div>

</body>
</html>
