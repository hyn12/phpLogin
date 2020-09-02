<?php
session_start();
include_once("lib.php");
include_once("db.php");//무조건 필요한 파일 require_once
if(!isset($_SESSION['user'])) {
    msgGo("로그인하고 오셈","index.php");
    exit;
}
if(!isset($_GET['id'])) {
    msgGo("리스트 먼저 갔다 오셈 ","list.php");
    exit;
}
$id = $_GET['id'];

$sql = "SELECT * FROM users where id=?";
$user = fecth($db,$sql,[$id]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?= $id ?>의 회원 정보 수정</h2>

    <form action="up_pro.php" method="post">
    ID : <?= $id ?><input type="hidden" name="id">
    <br>
    NAME: <input type="text" name="name" value="<?=$user->name ?>">
    <br>
    PW: <input type="password" name="password">
    <br>
    <input type="hidden" name="id" value="<?=$user->id ?>">
    <input type="hidden" name="pwCheck" value="<?=$user->password ?>">
    <input type="submit" value="바꾸기">
    </form>
</body>
</html>