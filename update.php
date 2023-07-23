<?php
//1. POSTデータ取得
$Name   = $_POST["Name"];
$URL  = $_POST["URL"];
$Comment = $_POST["Comment"];
$id    = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET Name=:Name, URL=:URL, age=:age, Comment=:Comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':Name',  $Name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', $URL,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Comment',$Comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}
