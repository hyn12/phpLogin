<?php
include("lib.php");
include("db.php");

$inputId = $_POST['id'];
$name = $_POST['name'];
$pass = $_POST['password'];
$passC = $_POST['pwCheck'];

$sql = "SELECT * FROM users WHERE id=?";
$id = fecth($db,$sql,[$inputId]);

dump($id);

if (empty($inputId)||empty($name)||empty($pass)||empty($passC )) {
    msgBack("전부 공백불가");
    exit;
}
if($id) {
    msgBack("아이디 중복");
    exit;
}
$isNum=false;
$id = str_replace(" ", "", $inputId );
echo mb_strlen($id);

if(mb_strlen($name )<3) {
        msgBack("이름 3글자이상만");
        exit;
}

$isNum=is_numeric($_POST['password']);

if($isNum) {
        msgBack("비번은 숫자로만 구성 불가");
        exit;
} 
if(mb_strlen($pass)<8) {
    msgBack("비번은 8자 이상");
    exit;
}
if ($pass != $passC) {
    msgBack("비번과 비번확인은 일치해야함");
    exit;
}

$sql = "INSERT INTO users VALUES (?,?,?,1)";
execute($db,$sql,[$inputId,$name,$pass]);
msgGo("성공적으로 계정 생성!","index.php");