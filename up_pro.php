<?php
session_start();
include_once("lib.php");
include_once("db.php");//무조건 필요한 파일 require_once
if(!isset($_SESSION['user'])) {
    msgGo("로그인하고 오셈","index.php");
}
$id = $_POST['id'];
$name = $_POST['name'];
$pass = $_POST['password'];
$pwCheck = $_POST['pwCheck'];

if($pass != $pwCheck) {
    msgBack("비번이 맞지 않음");
    exit;
}

$sql = "UPDATE users SET `name` = ? WHERE id = ?";
execute($db,$sql,[$name,$id]);

msgGo("수정완료","list.php");