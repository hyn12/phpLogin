<?php
session_start();
include_once("lib.php");
include_once("db.php");

if(!isset($_SESSION['user'])) {
    msgGo("로그인하고 오셈","index.php");
    exit;
}
if(!isset($_GET['id'])) {
    msgGo("리스트 먼저 갔다 오셈 ","list.php");
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM users where id=?";
execute($db,$sql,[$id]);
msgGo("회원 삭제함","list.php");