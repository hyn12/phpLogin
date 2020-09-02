<?php
session_start();
include_once("lib.php");
include_once("db.php");//무조건 필요한 파일 require_once
if(!isset($_SESSION['user'])) {
    msgGo("로그인하고 오셈","index.php");
}
unset($_SESSION['user']);
msgBack("로그아웃 함");