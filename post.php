<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$errors = array();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['login'] == false) {
    $errors[] = "Need to login.";
} else {
    $title = strip_tags(htmlentities(htmlspecialchars(filter_var($_POST['title'], FILTER_SANITIZE_STRING))));
    $password = $_POST['password'];
    $message = strip_tags(htmlentities(htmlspecialchars(filter_var($_POST['message'], FILTER_SANITIZE_STRING))));
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
    if(empty($title)) {
        $errors[] = "Title is required.";
    } else {
        if(strlen($title)<4) {
            $errors[] = "Title can't be shorter than 4 characters.";
        }
        if(strlen($title)>80) {
            $errors[] = "Title can't be larger than 80 characters.";
        }  
    }
    if(empty($message)) {
        $errors[] = "Message is required.";
    }
    if(empty($errors)) {
        if(empty($password)) {
            $is_locked = 0;
            $final = $password;
        } else {
            $is_locked = 1;
            $final = password_hash($password, PASSWORD_DEFAULT);
        }
        $query = 'INSERT INTO posts(owner, title, password, is_locked, message)
             VALUES(:owner, :title, :password, :is_locked, :message)'; 
        $r = $hd->prepare($query);
        $values = array(':owner'=>$_SESSION['username'], ':title'=>$title, ':password'=>$final, ':is_locked'=>$is_locked, ':message'=>$message);
        $res = $r->execute($values);
        if ($res) {
            header("location: dashboard.php");
        }
    }

    } 

if(!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: #ba414b; margin-left: 20px">'.htmlspecialchars($error).'</p>';
    }
}