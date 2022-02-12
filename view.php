<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$errors = array();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (filter_var($_GET['id'], FILTER_VALIDATE_INT) === 0 || !filter_var($_GET['id'], FILTER_VALIDATE_INT) === false) {
    try{
    $sql = "SELECT * FROM posts WHERE id=:id";
    $db = $hd->prepare($sql);
    $values = array(':id'=>$_GET['id']);
    $result = $db->execute($values);
    $f = $db->fetchAll();
    $is_locked = $f[0]["is_locked"];
    if($is_locked == 1 & $_SESSION['unlocked']!=$_GET['id'] || $is_locked==1 & !isset($_SESSION['unlocked'])) {
        echo '<div style="padding 20px;"><h3>Unlock</h3><form action="unlock.php" method="POST"><input style="width: 400px;background-color: #1b1e21;border: 1px solid grey;color: white;"class="form-control"type="password" name="password" placeholder="Password" aria-label="password"><br>      
        <input style="width: 400px;background-color: #1b1e21;border: 1px solid grey;color: white;"class="btn btn-primary"type="submit" value="Login"><input type="hidden" name="csrf" value="'.$_SESSION['csrf'].'"><input type="hidden" name="id" value="'.$_GET['id'].'"></form></div>';

    } else {
        echo '<div style="padding: 10px;">'.$f[0]['message'].'</div>';
    }
    } catch (PDOException $e) {
        echo $e;
    }
  } else {
    $errors[] = "Error";
  }
if(!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: #ba414b;">'.htmlspecialchars($error).'</p>';
    }
}
?>