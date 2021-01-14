<?php
session_start(); // セッションの開始
$_SESSION = array(); // セッション変数を空の配列で上書き 
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
header('Location:todo_login.php');
exit();
// クッキーの保持期限を過去にする // セッションの破棄
// ログインページヘ移動