<?php
include '../partials/database_connection.php';

$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$checkEmail = $pdo->prepare("SELECT email FROM users WHERE email = ?");
$checkEmail->execute([$email]);
if($checkEmail->rowCount() > 0 ){
    echo " mail already taken";
    
}else{
$statement = $pdo->prepare("INSERT INTO users
    ( password, name,  email) VALUES ( :password,:name,:email)");
$statement->execute(
    [
       
        ":password" => $hashed_password,
        ":name" => $name,
        ":email" => $email
    ]
);
 
$_SESSION["name"] = $_POST["name"]; 
$_SESSION["email"] = $_POST["email"]; 

header ('Location: ../views/login_form.php');
}
?>
<a href="../views/register_form.php" style="float:left;margin-top:10px;">Register with another mail</a>

