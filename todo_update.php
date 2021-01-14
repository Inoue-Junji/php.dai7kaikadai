<?php

// 送信データのチェック
// var_dump($_POST);
// exit();
session_start(); 
check_session_id();
// 関数ファイルの読み込み
include("functions.php");

// 送信データ受け取り
$result = $_POST['result'];
$date = $_POST['date'];
$score = $_POST['score'];
$starter = $_POST['starter'];
$memo = $_POST['memo'];
$id = $_POST["id"];

// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "UPDATE result_table SET result=:result, date=:date, updated_at=sysdate() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':result', $result, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);
$stmt->bindValue(':starter', $starter, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
    header("Location:todo_read.php");
    exit();
}