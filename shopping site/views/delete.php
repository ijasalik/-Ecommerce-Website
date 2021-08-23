<?php

include "../partials/database_connection.php"; 

$id = $_GET['id']; 

$step=$pdo->prepare("DELETE FROM cart WHERE id=:id");
$step->bindParam(":id",$id,PDO::PARAM_INT);
$step->execute();

if($step)
{
     
   header("location:new_checkout.php");
    exit;	
}
else
{
    echo "Error deleting record";
}
?>