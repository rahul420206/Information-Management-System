<?php
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
   
    if ($email == 'admin@example.com' && $pass == 'admin@ims') {
        session_start();
        
        $_SESSION['login'] = true;
        header('Location: ../admin/dashboard.php');
    }
    else {
        echo 'Invalid Credentials';
    }
  }