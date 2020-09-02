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
$sql = "DELETE FROM boards where id=?";
$posts=execute($db,$sql,[$id]);
$read = $posts ->readCnt;
$read--;
msgGo("글 삭제함","board.php");