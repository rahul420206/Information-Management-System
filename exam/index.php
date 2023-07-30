<?php

  $db_conn = mysqli_connect('localhost', 'root', '', 'game');

  if (!$db_conn) {

    echo 'Connection failed';
    exit;
    
  }

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password  = $_POST['password'];


    $query = mysqli_query($db_conn,"SELECT * FROM `dice` WHERE `username` = '$username' AND `password` = '$password'");

    if(mysqli_num_rows($query) > 0)
    {
      $user = mysqli_fetch_object($query);
      $_SESSION['login'] = true;
      $_SESSION['session_id'] = uniqid();
      
      $user_type = $user->type;
      $_SESSION['user_type'] = $user_type;
      $_SESSION['user_id'] = $user->id;
      header('Location: ../'.$user_type.'/game.php');
      exit();
    }
    else {
      echo 'Invailid Credentials';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1><b>Dice Game</b></h1>
<style>
h1{
    text-align: center;
}
</style>
</head>
<body>
    <section class="d-flex justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="border rounded-circle mx-auto d-flex" style="width:100px;height:100px"><i class="fa fa-user text-light fa-3x m-auto"></i></div>
                <form action="game.php" method="POST">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="email" id="email" name="email" class="form-control">
                        <label for="email">Your Email</label>
                    </div>
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="password" id="password" name="password" class="form-control">
                        <label for="password">Your Password</label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-secondary" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
