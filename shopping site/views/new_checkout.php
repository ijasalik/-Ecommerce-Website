<?php
session_start();
include '../partials/database_connection.php';
include '../partials/array_db.php';

?>
<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<style>
  .table td, .table th {
    padding: 1.75rem;
    vertical-align: text-top;
    border-top: 1px solid #dee2e6;
}
</style>
<body>
    <main class="container">
        <header>
        <a class="logotype" href="../index.php"><h1> Your cart</h1></a>
        
        <nav class="navbar">
                        <ul>
                            <?php if (!isset($_SESSION["email"])) {echo  "<li class='list-inline-item'> <a href='views/register_form.php'>Register</a></li>";} ?>
                            <?php if (isset($_SESSION["email"])) {echo  "<li class='list-inline-item'> <a href='../index.php'>Back to home</a></li>";} ?>
                            <?php if (isset($_SESSION["email"])) {echo  "<li class='list-inline-item'> <a href='../partials/logout.php'>Logout</a></li>";} ?>
                        </ul>
                    </nav>
            
            <h4 class="checkout_hello"><?php if (isset($_SESSION["email"])) {echo 'Hey ' . explode("@", $_SESSION["email"])[0] . '!' ;} ?></h4>
        </header>
        <div class="row justify-content-center">
            <div class="col-xs-12 text-center order_confirmation">
                
                <h4><?php if (isset($_SESSION["email"])) {echo 'Please check your order ' ;} ?></h4>
              
                        <?php 
                            $user_id = $_SESSION["email"];
                            
                            $statement = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id");
                        
                            $statement->execute(
                                [
                                    ":user_id" => $user_id,
                                ]
                            );
                            
                            $cart = $statement->fetchAll(PDO::FETCH_ASSOC);
                            
                            
                            ?> 
                            
                        <?php



                        ?>   

                        <br>
                        
                        <div class="table-responsive">  
                       
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          
                        <?php     $sum=0;  foreach ($cart as $cart_item){ ?>
                          <tr>  
                               <td><?php echo $cart_item["name"]; ?></td>  

                               <td><?php echo  $cart_item["quantity"]; ?></td>  

                               <td>₹ <?php echo  $cart_item["price"]; ?></td>  

                               <td>₹ <?php echo  $cart_item["quantity"] *$cart_item["price"]; ?></td>  

                               <td><a href="delete.php?id=<?php echo $cart_item["id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr> 
                          
                         
                          <?php  
                                    $sum = $sum + ( $cart_item["quantity"] * $cart_item["price"]);  
                               
                          ?>  
                           <?php } ?> 
                        
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">₹ <?php echo"$sum" ?></td>  
                               <td></td>  
                          </tr>  
                        

                     </table>  
                     <br>
                   
           
            </div>
        </div>
       
    </main>
        <p align="center"><a class="blue_button_complete_order"  name="order"  href="order_complete.php">place your order</a></p>

    </body>
</html>
