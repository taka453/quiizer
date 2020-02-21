<?php require_once 'database.php'; ?>
<?php session_start(); ?>

<?php
$number = $_GET['n'];

$stmt=$db->prepare("SELECT * FROM questions WHERE question_number = $number");
$stmt->execute();
$rows=$stmt->fetch();

$stmt=$db->prepare("SELECT * FROM choices WHERE question_number = $number");
$stmt->execute();
$choices=$stmt->fetchAll();

$stmt = $db->prepare("SELECT * FROM questions");
$stmt->execute();
$total=$stmt->rowCount();

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
            <div class="current">Question <?php echo $rows['question_number']; ?>of<?php echo $total; ?></div>
            <p class="question">
                <?php echo $rows['text']; ?>
            </p>
            <form action="process.php" method="post">
                <ul class="choices"> 
                    <?php foreach($choices as $row): ?>
                        <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <input type="submit" value="回答する">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
            </form>
        </div>
    </main>
</body>
</html>