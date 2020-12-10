<?php

// DB接続情報
$dbn = 'mysql:dbname=gacf_l04_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// データ参照SQL作成 ※PDF４９Pより追記
// SELECT文  ↓ テーブル名の後 ORDER BY id DESC で降順に
$sql = 'SELECT * FROM question_table  ORDER BY id DESC';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<div class='arrow_box'>";
    $output .= "<p>NAME: {$record["nickname"]}</ｐ>";
    $output .= "<p>E-mail: {$record["mail"]}</p>";
    $output .= "<p>分野: {$record["field"]}</p><br>";
    $output .= "<p>{$record["field_text"]}</p>";
    // ここから自分でいじった箇所
    $output .= "<p><a href='todo_edit.php?id={$record["id"]}'>edit</a></p>";
    $output .= "<p><a href='delete.php?id={$record["id"]}'>delete</a></p>";
    $output .= "</div>";
    $output .= "<br>";
    $output .= "　　😋👺😮🤖😋🤡🤣　　<br>";
    $output .= "<br>";
  }
}


// デリートエディット用

// var_dump($_GET);
// edit();

// include('functions.php');

// // idをgetで受け取る
// $id = $_GET['id'];

// $pdo = connect_to_db();
// // idを指定して更新するSQLを作成 -> 実行の処理
// // $sql = 'DELETE FROM todo_table WHERE id=:id';

// $sql = 'DELETE FROM question_field WHERE id=:id';

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();

// // fetch()で1レコード取得できる．
// if ($status == false) {
//   $error = $stmt->errorInfo();
//   echo json_encode(["error_msg" => "{$error[2]}"]);
//   exit();
// } else {
//   // 一覧画面にリダイレクト
//   header('Location:todo_read.php');
// }









?>





<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>データベース登録データ一覧</title>
  <link rel="stylesheet" href="css/read.css">
</head>

<body>

  <button><a href="input.php">戻る</a></button>
  <br>
  <br>

  <div class="all-wrapper">

    <div class="wrap">
      <table>


        <tbody>
          <!-- ここにフキダシの中に<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?= $output ?>
        </tbody>


      </table>
    </div>


    <div>

      <!-- 集計結果 -->
      <!-- <div class=form-box3>
        <div class="chart1">
          選択ジャンルの統計 :
          <br>
          <p class="text">これまであなたが選んだジャンルはこのような割合です</p>
          <canvas id="mycanvas" height="250" width="400"></canvas>
        </div>




      </div>
 -->

      <!-- グラフ用javascriptライブラリと自作JSの読込み -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
      <script src="js/read.js"></script>
    </div>
  </div>



</body>

</html>