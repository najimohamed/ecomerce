<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Connection</title>
</head>
<body>

<?php include 'include/nav.php' ?>

<div class="container py-2">

<?php 
  if(isset($_POST['connection'])){
    $login =$_POST['login'];
    $psw = $_POST['password'];

    if (!empty($login)&& !empty($psw)){
        
        require_once 'include/database.php' ;
        $sqlState = $pdo->prepare(query: 'SELECT * FROM user WHERE login=? AND password=?');
        $sqlState->execute([$login, $psw]);

        if ($sqlState->rowCount()>=1){
            //session_start();
            $_SESSION['user']= $sqlState->fetch();
            header( header: 'location: admin.php');
        }   else{
            ?>
               <div class="alert alert-danger" role="alert">
               Login or Password is uncorrect !
               </div>
             <?php       
        }
       
    }
    else{
        ?>
           <div class="alert alert-danger" role="alert">
           Login and Password are required !
           </div>
         <?php       
    }
  }


?>

<h4 style="margin-top: 60px; margin-bottom: 60px;" >Connection :</h4>
<form method='post'>

  <div class="mb-3">
    <label  class="form-label">Login</label>
    <input type="text" class="form-control" name="login"  >
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="password"  >
  </div>

  <button type="submit" class="btn btn-primary my-2" value="Connection" name="connection">Connection</button>

</form>

</div>





</body>
</html>