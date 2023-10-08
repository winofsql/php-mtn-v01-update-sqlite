<?php
require_once("setting.php");

header( "Content-Type: text/html; charset=utf-8" );

// データベースに接続する
require_once("db_connect.php");

// データ表示処理
if ( $_POST["btn"] == "確認" ) {
    $query = "select * from 社員マスタ where 社員コード = '{$_POST["scode"]}'";

    try {
        $stmt = $sqlite->prepare("select * from 社員マスタ where 社員コード = '{$_POST["scode"]}'");
        $stmt->execute();
    }
    catch ( PDOException $e ) {
        $error["db"] .= $dbname;
        $error["db"] .= " " . $e->getMessage();
    }

    if ( $error["db"] == " " ) {

        $row = $stmt->fetch();

        $_POST["sname"] = $row["氏名"];
        $_POST["fname"] = $row["フリガナ"];

        $_POST["syozoku"] = $row["所属"];
        $_POST["seibetsu"] = $row["性別"];
        $_POST["kyuyo"] = $row["給与"];
        $_POST["teate"] = $row["手当"];
        $_POST["kanri"] = $row["管理者"];
        $_POST["birth"] = $row["生年月日"];

    }
}

// データ更新処理
if ( $_POST["btn"] == "更新" ) {

    if ( $_POST["teate"] == ""  ) {
        $_POST["teate"] = "NULL";
    }

    if ( $_POST["kanri"] == ""  ) {
        $_POST["kanri"] = "NULL";
    }
    else {
        $_POST["kanri"] = "'{$_POST["kanri"]}'";
    }

// ヒアドキュメント
    $query = <<<QUERY
update 社員マスタ set
    氏名 = '{$_POST["sname"]}',
    フリガナ = '{$_POST["fname"]}',
    所属 = '{$_POST["syozoku"]}',
    性別 = {$_POST["seibetsu"]},
    給与 = {$_POST["kyuyo"]},
    手当 = {$_POST["teate"]},
    管理者 = {$_POST["kanri"]},
    生年月日 = '{$_POST["birth"]}'
where 社員コード = '{$_POST["scode"]}'
QUERY;

    // print $query;
    try {
        $stmt = $sqlite->prepare($query);
        $stmt->execute();
    }
    catch ( PDOException $e ) {
        $error["db"] .= $dbname;
        $error["db"] .= " " . $e->getMessage();
    }

}

require_once("syain-view.php");

debug_print();

