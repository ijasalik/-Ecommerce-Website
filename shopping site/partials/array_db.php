  <?php 
include 'database_connection.php';
$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$all_products = $statement->fetchAll(PDO::FETCH_ASSOC);
 
?>