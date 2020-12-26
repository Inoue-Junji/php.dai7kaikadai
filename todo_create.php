<?php
// var_dump($_POST);
// exit();

if (
  !isset($_POST['result']) || $_POST['result']=='' ||
  !isset($_POST['date']) || $_POST['date']=='' ||
  !isset($_POST['score']) || $_POST['score']=='' ||
  !isset($_POST['starter']) || $_POST['starter']=='' ||
  !isset($_POST['memo']) || $_POST['memo']==''
  ) {
  exit('ParamError'); 
}

$result = $_POST['result'];
$date = $_POST['date'];
$score = $_POST['score'];
$starter = $_POST['starter'];
$memo = $_POST['memo'];

// DB接続情報 「dbname」「port」「host」「username」「password」を設定
$dbn = 'mysql:dbname=gsacf_d07_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // (空文字)

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
  //exit('ok');
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// [dbError:]が表示されたらdb接続でエラーが発生していることが分かる

// SQLを書く
$sql = 'INSERT INTO result_table(id, result, date, score, starter, memo) VALUES(NULL, :result, :date, :score, :starter, :memo)';

$stmt = $pdo->prepare($sql);
// バインド変数を設定
$stmt->bindValue(':result', $result, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);
$stmt->bindValue(':starter', $starter, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
// SQLを実行
$status = $stmt->execute();

if ($status==false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示 
  exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
  header('Location:todo_input.php');
}