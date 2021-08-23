<?php
session_start();
include 'database_connection.php';
include 'array_db.php';

if(isset($_POST['login'])==false){
  echo "error";
  header('Location: ../index.php');
}

foreach ($all_products as $product){
  $user_id = $_SESSION["email"];
  $product_name = $product["name"];
  $quantity = ($_POST[$product["name"]]);

  
  $statement = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id AND name = :name");
  $statement->execute(
      [
          ":user_id" => $user_id,
          ":name" => $product_name
      ]
  );
  
  $check_item_array = $statement->fetch(PDO::FETCH_ASSOC);
  
  $product_exists = $check_item_array["name"];
  
  if (isset($check_item_array["name"])) {
    
    $statement = $pdo->prepare("UPDATE cart SET quantity = :quantity WHERE name = :name");
    
    $statement->execute(
        [
        ":name" => $product_name,
      
        ":quantity" => (int)$quantity + (int)$check_item_array["quantity"]
        ]
      );
        }
  
  else {

    
    if ($_POST[$product["name"]] >= 1) {

        
        $user_id = $_SESSION["email"];
        $product_name = $product["name"];
        $price = $product["price"];

        
        $statement = $pdo->prepare("INSERT INTO cart (user_id, name, price, quantity) 
          VALUES (:user_id, :name, :price, :quantity)");

      
        $statement->execute(
          [
          ":user_id" => $user_id,
          ":name" => $product_name,
          ":price" => $price,
          ":quantity" => $quantity
          ]
      );
    }
      }
  }
  
  header('Location: ../index.php');

?>