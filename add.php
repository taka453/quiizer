<?php
require_once 'database.php';

if(isset($_POST['submit'])) {
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];

    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];

    $stmt=$db->prepare("INSERT INTO questions(question_number, text)VALUES(:zquestion, :ztext)");

    $stmt->execute(array(
        'zquestion' => $question_number,
        'ztext' => $question_text
    ));

    foreach($choices as $choice => $value){
        if($value != '') {
            if($correct_choice == $choice) {
                $is_correct = 1;
            } else {
                $is_correct = 0;
            }

            $stmt_2=$db->prepare("INSERT INTO choices(question_number,is_correct,text)VALUES(:zquestion,:zcorrect,:ztext)");
            $stmt_2->execute(array(
                'zquestion' => $question_number,
                'zcorrect' => $is_correct,
                'ztext' => $value
            ));
        }
    }
    $meesage = '問題を追加しました';
}

$stmt=$db->prepare("SELECT * FROM questions");
$stmt->execute();
$total = $stmt->rowCount();
$next = $total+1;

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
            <h2>三択問題を追加する</h2>
            <form action="add.php" method="post">
                <p>
                    <label>番  号:</label>
                    <input type="number" value=<?php echo $next; ?> name="question_number">
                </p>
                <p>
                    <label>問  題:</label>
                    <input type="text" name="question_text">
                </p>
                <p>
                    <label>選択肢 1:</label>
                    <input type="text" name="choice1">
                </p>
                <p>
                    <label>選択肢 2:</label>
                    <input type="text" name="choice2">
                </p>
                <p>
                    <label>選択肢 3:</label>
                    <input type="text" name="choice3">
                </p>
                <p>
                    <label>正解番号:</label>
                    <input type="number" name="correct_choice">
                </p>
                <p>
                    <input type="submit" name="submit" value="登録する">
                </p>
            </form>
        </div>
    </main>
</body>
</html>

