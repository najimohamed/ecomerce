<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Category list</title>
</head>
<body>

<?php include 'include/nav.php' ?>

<div class="container py-2">
<h4 style="margin-top: 60px; margin-bottom: 60px;" >Category list :</h4>
<a href="category.php" class="btn btn-primary">Add a Category</a> <br><br>

<table class="table table-striped">
<thead>
<tr>
  <th>#ID</th>
  <th>Libelle</th>
  <th>Description</th>
  <th>Date</th>
  <th>Operations</th>
</tr>
</thead>

<tbody>
<?php 
 require_once 'include/database.php';
 $categorylist = $pdo->query('SELECT * FROM category')->fetchAll(PDO::FETCH_ASSOC);

foreach($categorylist as $category){
  ?>
  <tr>
    <td><?php echo $category['id']; ?></td>
    <td><?php echo $category['libelle']; ?></td>
    <td><?php echo $category['description']; ?></td> 
    <td><?php echo $category['date-creation']; ?></td>  
    <td>
      <a href="edit.php?id=<?php echo $category['id'] ?>" class= "btn btn-primary" >Edit</a>
      <a href="delete.php?id=<?php echo $category['id'] ?>"onclick="return confirm('are you sure you want to delete the category <?php echo $category['libelle'] ?>');"class= "btn btn-danger" >Delete</a>
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