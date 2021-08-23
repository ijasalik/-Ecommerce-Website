<?php
session_start();


include '../partials/database_connection.php';

$email = $_POST["email"];
$password = $_POST["password"];
$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$statement->execute(
    [
        ":email" => $email,
    ]
);
$fetched_user = $statement->fetch();

$is_password_correct = password_verify($password, $fetched_user["password"]);

if(!$email){
    echo "email is imcorrect";
}

if($is_password_correct){
    $_SESSION["email"] = $fetched_user["email"];
    header('Location: ../index.php');
} else {
    
    echo "Password is imcoorect";
 
}
?>
<a href="../views/login_form.php" style="float:center;margin-top:10px;">login again</a>

