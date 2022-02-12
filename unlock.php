<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$errors = array();
if (session_status() === PHP_SESSION_NONE) { 
    session_start();
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }}
if(!isset($_POST['csrf'])) {
        $errors[] = "Missing CSRF parameter";
    } else {
        if (!empty($_POST['csrf'])) {
            if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
                 $errors[] = "Wrong CSRF Token.";
            }
        } else {
            $errors[] = "Where is your CSRF Token?";
        }
    }
$sql = "SELECT * FROM posts WHERE id=:id";
$db = $hd->prepare($sql);
$values = array(':id'=>$_POST['id']);
$result = $db->execute($values);
$retard = $db->rowCount();
$f = $db->fetchAll();
if(password_verify($_POST['password'], $f[0]['password'])) {
    $_SESSION['unlocked'] = $_POST['id'];
    header("location: view.php?id=".$_POST['id']);
} else {
    $errors[] = "Incorrect password";
}
if(!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: #ba414b; margin-left: 20px">'.htmlspecialchars($error).'</p>';
    }
}
?>