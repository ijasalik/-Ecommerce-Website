<?php
session_start();
include '../partials/database_connection.php';
include '../partials/array_db.php';

$user_id = $_SESSION["email"];

      $statement = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
      $statement->execute(
          [
    ":user_id" => $_SESSION["email"],
          ]
    );

session_destroy();
header('Location: ../index.php');
?>
