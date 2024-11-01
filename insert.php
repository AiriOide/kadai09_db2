<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$question = $_POST["question"];

//2. DB接続します
//*** function化する！  *****************
include("funcs.php");//外部ファイルを読み込む
$pdo = db_conn();//どのページにもこの２行を入れてあげるだけで関数が実行される

//３．データ登録SQL作成
$sql = "INSERT INTO gs_table_3(name,email,question,indate)VALUES(:name,:email,:question,sysdate())";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':question', $question, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
}else{
    //*** function化する！*****************
    redirect("index.php");
}//全く同じ処理があると分かるようになってから、関数処理ができるようになる
?>
