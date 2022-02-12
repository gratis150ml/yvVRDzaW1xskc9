<?php
try {
    $user = "";
    $pass = "";
    $hd = new PDO('mysql:host=localhost;dbname=', $user, $pass);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">'.htmlspecialchars($e).'</div>';
    die();
}
?>