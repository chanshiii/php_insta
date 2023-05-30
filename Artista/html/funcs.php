<?php
//DBConnection
function db_conn(){
    try {
        $db_name = 'Artista_db';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト

        //localhostでなかればさくらに接続する
        if($_SERVER["HTTP_HOST"] != 'localhost'){
            $db_name = '';    //データベース名
            $db_id   = '';      //アカウント名
            $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
            $db_host = ''; //DBホスト
            }

        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
    
}

?>