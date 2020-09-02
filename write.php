<?php
session_start();
include_once("lib.php");
include_once("db.php");

if(!isset($_SESSION['user'])) {
    msgGo("로그인 먼저해주쇼","index.php");
    exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>글 작성 하기</h2>
    <form action="write_process.php" method="post">
        제목 : <input type="text" name="title"><br><br>
        내용 : <textarea name="content"cols="30" rows="15"></textarea><br>
        <input type="submit" value="작성">
    </form>
</body>
</html>