<?php



// DB接続情報
$dbn = 'mysql:dbname=gsacf_d07_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる.

$sql = 'SELECT * FROM result_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// $statusにSQLの実行結果が入る（取得したデータではない点に注意）

if ($status==false) {
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]); // 失敗時はエラー出力
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["date"]}</td>";
    $output .= "<td>{$record["result"]}</td>";
    $output .= "<td>{$record["score"]}</td>";
    $output .= "<td>{$record["starter"]}</td>";
    $output .= "<td>{$record["memo"]}</td>";
    $output .= "</tr>";
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>試合日誌（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>試合日誌（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>date</th>
          <th>result</th>
          <th>score</th>
          <th>starter</th>
          <th>memo</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>