<?php
// var_dump($_POST);
// exit();

if (
  !isset($_POST['todo']) || $_POST['todo']=='' ||
  !isset($_POST['deadline']) || $_POST['deadline']==''
  ) {
  exit('ParamError'); 
}

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

// DB接続情報 「dbname」「port」「host」「username」「password」を設定
$dbn = 'mysql:dbname=gsacf_d07_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

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
$sql = 'INSERT INTO todo_table(id, todo, deadline, created_at, updated_at) VALUES(NULL, :todo, :deadline, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
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