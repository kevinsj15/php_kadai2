<?php
//1. POSTデータ取得
$Name   = $_POST["Name"];
$URL  = $_POST["URL"];
$Comment = $_POST["Comment"];

//*** 外部ファイルを読み込む ***
include("funcs.php");
$pdo = db_conn();

//2. DB接続します
//*** function化を使う！  ***
// try {
//     $db_Name = "gs_db3";    //データベース名
//     $db_id   = "root";      //アカウント名
//     $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = "localhost"; //DBホスト
//     $pdo = new PDO('mysql:dbName=' . $db_Name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO kevin-james_gs_bm_table(Name,URL,Comment)VALUES(:Name,:URL,:Comment)");
$stmt->bindValue(':Name',  $Name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', $URL,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Comment',   $Comment,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status == false) {
    //*** function化を使う！*****************
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . $error[2]);
} else {
    //*** function化を使う！*****************
    // header("Location: index.php");
    redirect("index.php");
    exit();
}
