<?php   
require_once 'include/database.php';
var_dump($_GET);
$sqlState = $pdo->prepare('DELETE FROM product WHERE id=?');
$delete = $sqlState->execute([$id]);
header('location: productlist.php');

