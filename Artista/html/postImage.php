<?php
// エラーを出力する デプロイした時にどこにエラ〜が起きたか確認できる 注意としてはコードの一番上に記載する必要がある。
ini_set( 'display_errors', 1 );

include('./dbConfig.php');

$targetDirectory = './img/';
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDirectory . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($fileName)) {
    $arrImageTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $arrImageTypes)) {
        $postImageForServer = move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

        if ($postImageForServer) {
            $insert = $pdo->query("INSERT INTO Artista_table (file_name) VALUES ('" . $fileName . "')");
        }
    }
}

header('Location: ' . './index.php', true, 303);
exit();

?>