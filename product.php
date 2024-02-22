<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Add a Product</title>
</head>
<body>


<?php
 require_once 'include/database.php';
 include 'include/nav.php' ?>

<div class="container py-2">

<?php 
  if(isset ($_POST['add'])){
    
    $libelle = $_POST['libelle'];
    $price = $_POST['price'];
    $discount = $_POST ['discount'];
    $category = $_POST ['category'];
    $date = date (format: 'Y-m-d');

    if (!empty($libelle)&& !empty($price)&& !empty($category)){
      $sqlState =$pdo ->prepare( query:'INSERT INTO product VALUES (null,?,?,?,?,?)');     
      $inserted= $sqlState->execute([$libelle,$price,$discount,$category,$date]); 
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
    
    
    
    echo "libelle: $libelle , price : $price , discount: $discount , category: $category, creationdate: $date";
  }

?>

<h4 style="margin-top: 60px; margin-bottom: 60px;" >Add a Product :</h4>

<?php
if(isset($_POST['add'])){
   
    
} ?>

<form method='post'>

  <div class="mb-3">
    <label  class="form-label">Libelle</label>
    <input type="text" class="form-control" name="libelle"  >
  </div>
  <div class="mb-3">
    <label  class="form-label" >Price</label>
    <input type="number" class="form-control" step="0.5" name="price" min='0' >
  </div>
  <div class="mb-3">
    <label  class="form-label">Discount</label>
    <input type="number" class="form-control" name="discount" min='0' max= '90' value='0'  >
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
          echo "<option value='" . $category['id'] . "'>" . $category['libelle'] . "</option>";
          

        }
    ?>
  </select>

  <button type="submit" class="btn btn-primary my-2" value="Add  Product" name="add">Add a Product</button>

</form>

</div>