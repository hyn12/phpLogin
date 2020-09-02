<?php
session_start();
include("db.php");
include("lib.php");

$inputTi = $_POST['title'];
$inputCn = $_POST['content'];
$writer = $_SESSION['user']->name;

if(empty($inputTi)||empty($inputCn)) {
    msgBack("제목과 내용을 입력하시오.");
    exit;
}
$isNum=false;
$title = str_replace(" ", "", $inputTi );
if(mb_strlen($inputTi)<3) {
    msgBack("제목은 3글자 이상");
    exit;
}
$isNum = is_numeric($title);
if($isNum) {
    msgBack("제목에 숫자만 입력 불가");
    exit;
}

$sql = "INSERT INTO boards (`title`,`content`,`writer`,`readCnt`)values(?,?,?,0)";
execute($db,$sql,[$inputTi,$inputCn,$writer]);
msgGo("글 작성 완료!","index.php");