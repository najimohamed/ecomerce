<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Product list</title>
</head>
<body>

<?php include 'include/nav.php' ?>

<div class="container py-2">
<h4 style="margin-top: 60px; margin-bottom: 60px;" >Product list :</h4>
<a href="product.php" class="btn btn-primary">Add a Product</a> <br><br>

<table class="table table-striped">
<thead>
<tr>
  <th>#ID</th>
  <th>Libelle</th>
  <th>Price</th>
  <th>Discount</th>
  <th>Category</th>
  <th>Creation Date</th>
</tr>
</thead>

<tbody>
<?php 
 require_once 'include/database.php';
 $categorylist = $pdo->query("SELECT product.*, category.libelle as 'category_libelle' FROM product INNER JOIN category ON product.category = category.id")->fetchAll(PDO::FETCH_ASSOC);


foreach($categorylist as $category){
  $price = $category['price'];
  $discount= $category['discount'];
  $finalprice= $price-(($price*$discount)/100);
  ?>
  <tr>
    <td><?= $category['id'] ?></td>
    <td><?=  $category['libelle'] ?></td>
    <td><?=  $price ?> MAD</td>
    <td><?=  $discount ?> %</td>
    <td><?=  $category['category_libelle'] ?></td> 
    <td><?=  $category['creationdate'] ?></td>  
    <td>
    <a href="productedit.php?id=<?php echo $category['id'] ?>" class= "btn btn-primary" >Edit</a>
    <a href="delete.php?id=<?php echo $category['id'] ?>" class= "btn btn-danger" >Delete</a>
    </td> 
  </tr>
  <?php
}
?>
  </tbody>
  </table>
  

</div>





</body>
</html>