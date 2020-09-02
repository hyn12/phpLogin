<?php
session_start();
include_once("lib.php");
include_once("db.php");

$id = $_GET['id'];
$write = $_SESSION['user']->name;

$sql = "SELECT * FROM boards where id=?";
$posts = fecth($db,$sql,[$id]);
$read = $posts ->readCnt;
$read++;

$sql ="UPDATE boards SET `readcnt`=?  where id=?";
$check =execute($db,$sql,[$read,$id]);
    if(!$check) {
        msgBack('리드 카운트 증가 못함');
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
    <h1>제목 : <?=$posts->title ?> </h1>
    <h1>작성자 : <?=$posts->writer ?></h1>
    <h1>내용 : <?=$posts->content ?></h1>
    <a href="write.php">글 쓰러가기</a>
</body>
</html>