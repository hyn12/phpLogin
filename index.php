<?php 
session_start();
include_once('lib.php');
//회원가입 오그인 상태에서만 게시글 생성
// 회원리스트 전체 게시글 가져오기
//전체 게시글 버튼 클릭시 출력
// 자신의 게시글 보기하면 자기 꺼만
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  ul {
      list-style:none;
      height:500px;
  }
  li {
      height:25%;
  }
  a {
      text-decoration:none;
  }
  </style>
</head>
<body>

  <ul>
    <li><a href="register.php">회원가입</a></li>
    <li><a href="list.php">회원리스트</a></li>
    <li><a href="board.php">게시판</a></li>

  <?php 
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user']->name;
    echo "<li><a href=logout.php>{$user}님 로그아웃</a></li>";
}else {
    echo "<li><a href=login.php>로그인</a></li>";
}
?>
  </ul>
</body>
</html>