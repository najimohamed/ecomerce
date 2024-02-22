<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Add a Category</title>
</head>
<body>

<?php include 'include/nav.php' ?>

<div class="container py-2">

<?php 
  

?>

<h4 style="margin-top: 60px; margin-bottom: 60px;" >Add a Category :</h4>

<?php
if(isset($_POST['add'])){
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];

    if(!empty($libelle)&& !empty($description)){
        require_once 'include/database.php' ;
        $sqlState = $pdo->prepare(query: 'INSERT INTO category ( libelle,description) value(?,?)');
        $sqlState->execute([$libelle,$description]);
        //header('location: category.php');
        ?>
      <!-- <div class="alert alert-success" role="alert">
            the category <?php echo $libelle ?> has been added !
           </div>
      -->
        <?php
        header('location: categorylist.php');
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
            Libelle, Description are necessary !
            </div>
        <?php
    }
} ?>

<form method='post'>

  <div class="mb-3">
    <label  class="form-label">Libelle</label>
    <input type="text" class="form-control" name="libelle"  >
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
    <textarea class="form-control" name="description"></textarea>
  </div>

  <button type="submit" class="btn btn-primary my-2" value="Add  Category" name="add">Add a Category</button>

</form>

</div>