<?php
session_start();
include_once("lib.php");
include_once("db.php");
if(!isset($_SESSION['user'])) {
    msgGo("로그인하고 오셈","index.php");
}
if(!isset($_GET['id'])) {
    msgGo("게시판 먼저 갔다 오셈 ","board.php");
    exit;
}
$id = $_GET['id'];
// $title = $_GET['title'];

$sql = "SELECT * FROM users where id=?";
$posts = fecth($db,$sql,[$id]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2><?= $id ?>의 글 수정</h2>

<form action="up_write-pro.php" method="post">

<input type="submit" value="바꾸기">
</body>
</html>