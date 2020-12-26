<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>試合日誌（入力画面）</title>
</head>

<body>
  <form action="todo_create.php" method="POST">
    <fieldset>
      <legend>試合日誌（入力画面）</legend>
      <a href="todo_read.php">試合結果一覧画面</a>
      <div>
        result: <input type="text" name="result">
      </div>
      <div>
        date: <input type="date" name="date">
      </div>
      <div>
        score: <input type="text" name="score">
      </div>
      <div>
        starter: <input type="text" name="starter">
      </div>
      <div>
        memo: <input type="text" name="memo">
      </div>

      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>