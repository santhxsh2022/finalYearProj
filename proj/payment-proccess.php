 <?php
  try {
      // Database connection
      $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');
  
      // Prepare SQL query
      $stmt = $pdo->prepare("INSERT INTO payment (user_id, payment_id, amount, product_id) VALUES (:user_id, :payment_id, :amount, :product_id)");
  
      // Bind parameters
      $stmt->bindParam(':user_id', $_POST['user_id']);
      $stmt->bindParam(':payment_id', $_POST['razorpay_payment_id']);
      $stmt->bindParam(':amount', $_POST['totalAmount']);
      $stmt->bindParam(':product_id', $_POST['product_id']);
  
      // Execute the query
      $stmt->execute();
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
 $arr = array('msg' => 'Payment successfully credited', 'status' => true);  

 echo json_encode($arr);

?>