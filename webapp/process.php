<?php
$username = $_POST['username'];
$password  = $_POST['password'];
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = $_POST['username'];
$password  = $_POST['password'];
$conn = mysqli_connect("localhost", "root", "", "login");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$result = mysqli_query($conn, "select * from users where username = '$username' and password = '$password'") or die("Failed to query database " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password ){
    header('Location: game.php');
} else {
    echo "Failed to Login!";
}
mysqli_close($conn);
?>
