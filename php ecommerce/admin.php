<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Admin</title>
</head> 
<body>

<?php include 'include/nav.php' ?>

<div class="container py-2">

<?php 
//session_start();
//var_dump($_SESSION['user']);
if (!isset($_SESSION['user'])){
   // echo 'acces denied'; die();
    header( header: 'location: connection.php');
}
?>

<h3>Welcome Back : <?php echo $_SESSION['user']['login'] ?></h3>

</div>





</body>
</html>