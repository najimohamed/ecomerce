<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Edit a Category</title>
</head>
<body>

<?php include 'include/nav.php' ?>

<div class="container py-2">

<h4 style="margin-top: 60px; margin-bottom: 60px;" >Edit a Category :</h4>

<?php
 require_once 'include/database.php';
 $sqlState = $pdo->prepare('SELECT * FROM category WHERE id=?');
 $id = $_GET['id'];

 $sqlState->execute([$id]);
 $category = $sqlState->fetch(PDO::FETCH_ASSOC);

 if (isset($_POST['edit'])) {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];

    if (!empty($libelle) && !empty($description)) {
        $sqlState = $pdo->prepare('UPDATE category
                                            SET libelle = ? ,
                                                description = ?
                                        WHERE id = ?
                                        ');
        $sqlState->execute([$libelle, $description, $id]);
        header('location: categorylist.php');
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Libelle , description are necessary !
        </div>
        <?php
    }

}

?>



<form method='post'>

     <input type="hidden" class="form-control" name="id" value="<?php echo $category['id'] ?>">

  <div class="mb-3">
    <label  class="form-label">Libelle</label>
    <input type="text" class="form-control" name="libelle" value="<?php echo $category['libelle'] ?>"  >
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
    <textarea class="form-control" name="description"><?php echo $category['description'] ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary my-2" value="Edit Category" name="edit">Edit the Category</button>

</form>

</div>