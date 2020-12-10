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

// var_dump($_POST);
// exit();


if (
  !isset($_POST['nickname']) || $_POST['nickname'] == '' ||
  !isset($_POST['mail']) || $_POST['mail'] == '' ||
  !isset($_POST['field']) || $_POST['field'] == '' ||
  !isset($_POST['field_text']) || $_POST['field_text'] == ''
  // !isset($_POST['shihon']) || $_POST['shihon'] == '' ||
  // !isset($_POST['syainsu']) || $_POST['syainsu'] == '' ||
  // !isset($_POST['gengo']) || $_POST['gengo'] == ''
) {
  exit('ParamError');
}



// データを変数に格納
$nickname = $_POST['nickname'];
$mail = $_POST['mail'];
$field = $_POST['field'];
$field_text = $_POST['field_text'];
// $shihon = $_POST['shihon'];
// $syainsu = $_POST['syainsu'];
// $gengo = $_POST['gengo'];

// 「dbname」「port」「host」「username」「password」を設定
$dbn
  = 'mysql:dbname=gacf_l04_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // （空文字）
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．


// SQL作成&実行
// $sql = 'INSERT INTO
// question_table(id, nickname, mail, field, field_text, shihon, syainsu, gengo)
// VALUES(NULL, :nickname, :mail, :field, :field_text, :shihon, :syainsu, :gengo)';
$sql = 'INSERT INTO
question_table(id, nickname, mail, field, field_text)
VALUES(NULL, :nickname, :mail, :field, :field_text)';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':field', $field, PDO::PARAM_STR);
$stmt->bindValue(':field_text', $field_text, PDO::PARAM_STR);
// $stmt->bindValue(':shihon', $shihon, PDO::PARAM_STR);
// $stmt->bindValue(':syainsu', $syainsu, PDO::PARAM_STR);
// $stmt->bindValue(':gengo', $gengo, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行



// 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status == false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:input.php');
}
