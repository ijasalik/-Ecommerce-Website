<?php
session_start();
include 'database_connection.php';
include '../array_db.php';
$user_id = $_SESSION["email"];

      $statement = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
      $statement->execute(
          [
      ":user_id" => $_SESSION["email"],
          ]
      );

    header('Location: ../index.php');
?>