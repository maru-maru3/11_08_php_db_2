<?php



// $todo = $_POST['todo'];
// $deadline = $_POST['deadline'];
// 各値をpostで受け取る
$id = $_POST['id'];

include('functions.php');
$pdo = connect_to_db();

// idを指定して更新するSQLを作成（UPDATE文）
$sql = "UPDATE question_table SET nickname=:nickname, field=:field, field_text=:field_text,
-- updated_at=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);

$stmt->bindValue(':field', $field, PDO::PARAM_STR);
$stmt->bindValue(':field_text', $field_text, PDO::PARAM_STR);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// var_dump($_POST);
// exit();






// 各値をpostで受け取る
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常に実行された場合は一覧ページファイルに移動し，処理を実行する
    header("Location:read.php");
    exit();
}
