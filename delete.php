<?php   
require_once 'include/database.php';

$id = $_GET['id'];
$sqlState = $pdo->prepare('DELETE FROM category WHERE id=?');
$delete = $sqlState->execute([$id]);
header('location: categorylist.php');

$sqlState = $pdo->prepare('DELETE FROM product WHERE id=?');
$delete = $sqlState->execute([$id]);
header('location: productlist.php');
