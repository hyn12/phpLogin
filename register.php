<?php
session_start();
include("lib.php");
include("db.php");

if(isset($_SESSION['user'])) {
    msgGo("로그인 상태에선 회원가입 불가","index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register_process.php" method="post">
    ID : <input type="text" name="id">
    <br>
    NAME: <input type="text" name="name">
    <br>
    PW: <input type="password" name="password">
    <br>
    PW Check: <input type="password" name="pwCheck">
    <input type="submit" value="회원가입">
    </form>
</body>
</html>