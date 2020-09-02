<?php
session_start();
include_once("lib.php");
include_once("db.php");

if(!isset($_SESSION['user'])) {
    msgGo("로그인 먼저해주쇼","index.php");
    exit;
}

$sql = "SELECT * FROM users";
$userList = fecthAll($db,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
  li {
      height:25%;
  }
  a {
      text-decoration:none;
  }
  </style>
    <table border=1>
    <tr>
    <th>아이디</th>
    <th>이름</th>
    <th>관리</th>
    </tr>
    <?php foreach($userList as $user) :  ?>
        <tr>
        <td><?= $user->id ?></td>
        <td><?= $user->name ?></td>
        <td>
        <a class="btn" href="del.php?id=<?= $user->id ?>">아이디 삭제</a><br>
        <a class="btn" href="up.php?id=<?= $user->id ?>">아이디 수정</a>
        </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>