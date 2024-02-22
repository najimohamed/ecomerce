<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Edit a Product</title>
</head>
<body>


<?php
 require_once 'include/database.php';
 include 'include/nav.php' ?>

<div class="container py-2">

<?php 
  if(isset ($_POST['edit'])){
    
    $libelle = $_POST['libelle'];
    $price = $_POST['price'];
    $discount = $_POST ['discount'];
    $category = $_POST ['category'];
    $id = $_POST['id'];

    if (!empty($libelle)&& !empty($price)&& !empty($category)){
      $sqlState =$pdo ->prepare( query:'UPDATE product SET 
                                                    libelle=? ,
                                                    price=? ,
                                                    discount=? ,
                                                    category=?
                                                WHERE id = ?');     
      $updated= $sqlState->execute([$libelle,$price,$discount,$category,$id]); 
      //var_dump($sqlState->errorInfo());


  ?> 
  <!-- 
    <div class="alert alert-success" role="alert">
          the product <?php echo $libelle ?> has been added !
    </div>
  -->  
  <?php
  header('location: productlist.php');
    }else {
      ?>
       
      <div class="alert alert-danger" role="alert">
      Libelle, Price, Category are neceseery !
      </div>
      <?php
    }
    
  }

?>

<h4 style="margin-top: 60px; margin-bottom: 60px;" >Edit a Product :</h4>

<?php

$id =$_GET['id'];
$sqlState = $pdo->prepare('SELECT * from product WHERE id=?');
$sqlState->execute([$id]);
$product = $sqlState->fetch(PDO::FETCH_OBJ);;
if(isset($_POST['edit'])){
      
} ?>

<form method='post'>
<input type="hidden" name= "id"  class="form-label" value="<?= $product->id ?>">

  <div class="mb-3">
    <label  class="form-label">Libelle</label>
    <input type="text" class="form-control" name="libelle" value="<?= $product->libelle ?>" >
  </div>
  <div class="mb-3">
    <label  class="form-label" >Price</label>
    <input type="number" class="form-control" step="0.5" name="price" min='0' value="<?= $product->price ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Discount</label>
    <input type="number" class="form-control" name="discount" min='0' max= '90' value='0' value="<?= $product->discount ?>" >
  </div>

  <?php
  $statement = $pdo->query('SELECT * FROM category');
  $category = $statement->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <label  class="form-label">Categories</label>
  <select name= 'category' class="form-control my-2">
    <option value=''>Choose a Category</option>
    <?php
    
        foreach ($category as $category) {
          if($product->category == $category ['id']){
            echo "<option selected value='" . $category['id'] . "'>" . $category['libelle'] . "</option>";
          }
          else{
          echo "<option value='" . $category['id'] . "'>" . $category['libelle'] . "</option>";
        }

        }
    ?>
  </select>

  <button type="submit" class="btn btn-primary my-2" value="Edit Product" name="edit">Edit a Product</button>

</form>

</div>