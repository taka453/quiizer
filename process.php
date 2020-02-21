<?php 
require_once 'database.php'; 

session_start();

if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
} 

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;

    $stmt=$db->prepare("SELECT * FROM choices WHERE question_number = $number AND is_correct = 1");
    $stmt->execute();
    $row = $stmt->fetch();
    $correct_choice = $row['id'];

    if($correct_choice == $selected_choice){
        $_SESSION['score']++;
    }

     $stmt = $db->prepare("SELECT * FROM questions");
     $stmt->execute();
     $total = $stmt->rowCount();

     if($number == $total) {
         header("Location: final.php");
         exit();
     } else {
         header("Location: question.php?n= $next");
     }
}