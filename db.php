<?php 
$host = "127.0.0.1";
$dbname="test";
$charset="utf8mb4";
$user = "root";
$pass = "1234";

$str= "mysql:host={$host}; dbname={$dbname}; 
charset={$charset}";
$option=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];
$db = new PDO($str,$user,$pass,$option);
//$db = PDO(php데이터 오브젝트)
//$sql = sql실행(execute)문

//fecth사용은 select일때만
//다른건 execute만
function fecth($db,$sql,$param=[]) {
    $q = $db->prepare($sql);//prepare = 준비하다
    $q->execute($param);
    return $q -> fetch(); //연관배열 1개 
}

function fecthAll($db,$sql,$param=[]) {
    $q = $db->prepare($sql);
    $q->execute($param);
    return $q -> fetchAll(); //이중배열
}


function execute($db,$sql,$param=[]){
    $q = $db -> prepare($sql);
    return $q -> execute($param);
}