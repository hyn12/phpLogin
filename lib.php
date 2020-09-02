<?php
function dump($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
function msgGo($message,$url) {
    echo "<script>";
    echo "alert('$message');";
    echo "location.href='$url'";
    echo "</script>";
}
function msgBack($message) {
    echo "<script>";
    echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
}