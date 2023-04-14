<?php

require 'database.php';
$func = new functions();

if (!isset($_SESSION["inspected"])) {
    header('location: index4.php');
}

$statement = $func->pdo->prepare('SELECT * FROM objects WHERE item_id = :id');

$statement->bindParam(":id", $_SESSION["inspected"]);
$statement->execute();

$result = $statement->fetch();

echo $result['item_name'];
echo '</br>';
echo $result['rating'];



?>



