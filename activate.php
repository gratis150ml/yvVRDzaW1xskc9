<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$errors = array();
if (isset($_GET) & !empty($_GET)) {
    $email=filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $code=filter_var($_GET['code'], FILTER_SANITIZE_STRING);
    if(!isset($_GET['code'])) {
        $errors[] = "Missing code parameter.";
    }elseif(empty($_GET['code'])) {
        $errors[] = "Missing value of code parameter.";
    }
    if(!isset($_GET['email'])) {
        $errors[] = "Missing email parameter.";
    } elseif(empty($_GET['email'])) {
        $errors[] = "Missing value of email parameter.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Not a valid email";
      }                             
    $sql = 'SELECT id, code, activation_expiry < now() as expired, active FROM users WHERE email=:email';
    $db = $hd->prepare($sql);
    $values = array(':email'=>$email);
    $result = $db->execute($values);
    $retard = $db->rowCount();
    $f = $db->fetchAll();
    $expired = (int)$f[0]['expired'];
    $hash = $f[0][1];
    if ((int)$f[0][3] === 1) {
        $errors[] = "Your account has been already activated";
    } else {
        if(!$retard==1) {
            $errors[] = "Invalid email";
        }
        if(isset($_GET['code']) & !empty($_GET['code'])){
            if (!password_verify($code, $hash)) {
                $errors[] = "Invalid code.";
            } else {
                if ($expired === 1){
                    $errors[] = "Code expired. Please register again...";
                    $sql = 'DELETE FROM users WHERE code =:code and active=0';
                    $db = $hd->prepare($sql);
                    $values = array(':code'=>$hash);
                    $db->execute($values);
                }
            }}
    }
    if(empty($errors)) {
        $sql = "UPDATE users SET active = 1, activated_at = CURRENT_TIMESTAMP, code = 0, activation_expiry = '0000-00-00 00:00:00' WHERE code=:code";
        $db = $hd->prepare($sql);
        $values = array(':code'=>$hash);
        $result = $db->execute($values);
        if ($result) {
            $final = "Your account has been activated successfully. Now you can login.";
        }
    }
}
else {
    $errors[] = "Missing all parameters.";
}
if(!empty($final)) {
    echo '<p style="color: #63b28c;">'.htmlspecialchars($final).'</p>';
}
if(!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: #ba414b;">'.htmlspecialchars($error).'</p>';
    }
}
?>