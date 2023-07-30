<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <form action="process.php" method="POST">
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
    <div id="frm">
        <form action="process.php" method="POST">
            <p>
                <label>Username: </label>
                <input type="text" id="username" name="username"/>
            </p>
            <p>
                <label>Password: </label>
                <input type="password" id="password" name="password"/>
            </p>
            <p>
                <input type="submit" id="btn" value="Login" />
            </p>
        </form>
    </div>
    
</body>
</html>