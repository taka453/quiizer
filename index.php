<?php 
//
require_once 'database.php';

$stmt=$db->prepare("SELECT * FROM questions");
$stmt->execute();
$total = $stmt->rowCount();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>クイズ</title>
    <link rel=stylesheet href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>クイズ</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>三択クイズで遊ぼう</h2>
            <p>小学生のお子さんでもピッタリです。<br>親子で楽しんでください。</p>
            <ul>
                <li><span>問題数:</span> <?php echo $total; ?></li>
                <li><span>どんな問題:</span> いろいろな問題があります</li>
                <li><span>所要時間:</span><?php echo $total * 0.5 .'分'; ?></li>
            </ul>
            <a href="question.php?n=1" class="start">クイズスタート</a>
        </div>
    </main>
</body>
</html>