<?php
session_start();
include 'partials/database_connection.php';
include 'partials/array_db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <header>
    <a class="logotype" href="index.php"><h1> E cart </h1></a>
            <nav class="navbar">
                    <ul>
                        <?php if (!isset($_SESSION["email"])) {echo  "<li class='list-inline-item'> <a href='views/register_form.php'>Register</a></li>";} ?>
                        <?php if (!isset($_SESSION["email"])) {echo  "<li class='list-inline-item'> <a href='views/login_form.php'>Login</a></li>";} ?>
                        <?php if (isset($_SESSION["email"])) {echo  "<li class='list-inline-item'> <a href='partials/logout.php'>Logout</a></li>";} ?>
                    </ul>
                </nav>
     <h4><?php 

     if (isset($_SESSION["email"])) {echo 'welcome ' .explode("@", $_SESSION["email"])[0] . '!' ;?></h4>

            <div class="col-xs-12 shopping_cart">

                    <?php if (isset($_SESSION["email"]))  ?>
                        <?php 
                            $user_id = $_SESSION["email"];
                            $statement = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id");

                            $statement->execute(
                                [
                                    ":user_id" => $user_id,
                                ]
                            );
                            $cart = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($cart as $cart_item){
                                echo "<p><b>"  . $cart_item["quantity"] . ' products of ' . $cart_item["name"] . "</b></p>";
                            }
                        ?>   
                <ul>
                    <li class="list-inline-item grey_button"><a class="grey_button" href="partials/empty_cart.php">Clear your cart</a></li>
                    <li class="list-inline-item blue_button"><a class="blue_button" href="views/new_checkout.php">Go to cart</a></li>
                </ul>
            </div>
            <?php }  ?>
    </header>
            <div class="row justify-content-around">
                <?php
                foreach ($all_products as $product): ?>
                <div class="cardcontainer col-sm-12 col-md-4">
                    <div class="card">
                        <p class="produktnamn"><?= $product["name"]; ?> <br> <small> <?= $product["description"]; ?></small> <br> ₹ <?= $product["price"]; ?></p>  
                          
                        <img src="uploads/<?= $product["image"]; ?>" />
                        <?= "<input type='number' class='inputcard' form='mainform' name='" .$product["name"] . "' placeholder='Enter the number of products' >"; ?> 
                        <?= "<input type='submit' form='mainform' class='cart_button' form='' value='Add to cart'>"; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <form hidden name="mainform" id="mainform" action="partials/add_new_product.php" method="POST">
            </form>
    </main>
</body>
</html>