<?php session_start(); ?>
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
            <h2>お疲れ様でした！</2>
            <p>全問終了です。</p>
            <p>あなたの正解数は: <?php echo $_SESSION['score']; ?>問です</p>
            <?php
                session_unset();
                session_destroy();
            ?>
            <a href="index.php?n=1" class="start">もう一度最初からスタートする</a>
        </div>
    </main>
</body>
</html>
</html>