<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login_process.php" method="post">
    <input type="text" name="id">
    <br>
    <input type="password" name="password">
    <input type="submit" value="로그인">
    </form>
</body>
</html>