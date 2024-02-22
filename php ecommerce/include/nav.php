<?php
session_start();
$connected = false;
if(isset($_SESSION['user'])){
  $connected = true;
}
 

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary"> 
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Create a new Account</a>
        </li>

        <?php  
        if($connected){
        ?> 
        <li class="nav-item ">
          <a class="nav-link" href="categorylist.php">Category list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productlist.php">Product list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Add a Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php">Add a Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deconnection.php">Deconnection</a>
        </li>
        <?php 
        } else{
          ?>
          <li class="nav-item">
          <a class="nav-link" href="connection.php">Connection</a>
        </li>
        <?php
        }
        ?>
        

       
      </ul>
    </div>
  </div>
</nav>