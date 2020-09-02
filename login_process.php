<?php 
session_start();
include("lib.php");//php불러오기
include("db.php");

$inputId = $_POST['id'];
$inputPass = $_POST['password'];

$sql="SELECT * FROM users where id =? and password = ? ";
$user=fecth($db,$sql,[$inputId,$inputPass]);
dump($user);

if($user!=null) {
    //세션 생성
    $_SESSION['user']=$user;
    msgGo('로그인 성공','index.php');
}
else {
    msgBack('로그인 실패');
}
