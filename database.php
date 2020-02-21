<?php 

$dsn ='mysql:dbname=quizzer;host=localhost;charset=utf8';
$user='root';
$pass='';

try {
    $db = new PDO($dsn,$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "DB接続エラー:" . $e->getMessage();
}
