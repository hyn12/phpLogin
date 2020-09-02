<?php
session_start();
include_once("lib.php");
include_once("db.php");

if(!isset($_SESSION['user'])) {
    msgGo("로그인 먼저해주쇼","index.php");
    exit;
}

if (isset($_SESSION['writer'])) {
    $sql = "SELECT * FROM boards where writer=?";
    $posts = fecthAll($db,$sql,[$_SESSION['writer']]);

}else {
    $sql = "SELECT * FROM boards";
    $posts = fecthAll($db,$sql);
}

// dump($posts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>조회수</th>
            <th>관리</th><!--게시판 수정 삭제-->

        </tr>
        <?php foreach($posts as $post) : ?>
            <tr>
                <td><?= $post->id ?></td>
                <td><a href="view.php?id=<?= $post->id ?>"><?= $post->title ?></a></td>
                <td><?= $post->readCnt ?></td>
                <td>
                <a href="del_write.php?id=<?=$post->id ?>">삭제</a>
                <a href="up_write.php?id=<?php $post->id;$post->title ?>">수정</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php if(!isset($_SESSION['writer'])) { 
        $_SESSION['writer'] = $_SESSION['user']->name; // 새션 생성 
        ?>
    <a href="board.php">내 게시글만 보기</a>
    <?php } else {
         unset($_SESSION['writer']) 
         ?>
        <a href="board.php?">전체글 보기</a>
    <?php } ?>
    <a href="write.php">글 쓰러가기</a>
</body>
</html>