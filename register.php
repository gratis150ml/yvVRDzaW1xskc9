<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$errors = array();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if ($_SESSION['login'] == true) {
        header("location: dashboard.php");
    } 
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
}
if (isset($_POST) & !empty($_POST)) {
    if(empty($_POST['username'])) {
        $errors[]="Username is required.";
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $number = strlen($username);
        if(!ctype_alnum($username)) {   
            $errors[] = 'Username can only contain letters and digits.';
        }
        if($number>20) {
            $errors[] = 'Username cant be longer than 20 characters.';
        }
        if($number<4) {
            $errors[] = 'Username cant be shorter than 4 characters.';
        }
        $db = $hd->prepare("SELECT username from users WHERE username = :username");
        $values = array(':username' => $username);
        $db->execute($values);
        if($db->rowCount()>0){
            $errors[] = "Username is unavailable.";
        }
    }
    if(empty($_POST['email'])) {
        $errors[]="Email is required.";
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $db = $hd->prepare("SELECT email from users WHERE email = :email");
            $values = array(':email' => $email);
            $db->execute($values);
            if($db->rowCount()>0){
                $errors[] = "Email is unavailable.";
            }
        } else {
            $errors[] = "Not a valid email.";
        }
    }
    if(empty($_POST['password'])) {
        $errors[]="Password is required.";
    } else {
        if(empty($_POST['password2'])){
            $errors[]="Password Confirmation is required.";
        } else {
            if($_POST['password'] == $_POST['password2']){
                $plain_text = $_POST['password'];
                $uppercase123 = preg_match('@[A-Z]@', $plain_text);
                $lowercase123 = preg_match('@[a-z]@', $plain_text);
                $number123    = preg_match('@[0-9]@', $plain_text);
                $specialChars123 = preg_match('@[^\w]@', $plain_text);
                if(!$uppercase123 || !$lowercase123 || !$number123 || !$specialChars123 || strlen($plain_text) < 72) {
                 $errors[] = "Password must be at least 72 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                } else {
                    $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
                }
            } else {
                $errors[] = "Passwords do not match.";
            }
        }
    }
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
    if(empty($errors)) {
        $is_admin = 0;
        $code = bin2hex(random_bytes(32));
        $id = $hd->lastInsertID();
        $query = 'INSERT INTO users(id, username, email, password, is_admin, code, activation_expiry) VALUES(:id, :username, :email, :password, :is_admin, :code, :activation_expiry)'; 
        $r = $hd->prepare($query);
        $values = array(':id' => $id, ':username'=>$username, ':email'=>$email, ':password'=>$hashed, ':is_admin'=>$is_admin, ':code'=>password_hash($code, PASSWORD_DEFAULT), ':activation_expiry'=>date('Y-m-d H:i:s', strtotime('+15 minutes')));
        $res = $r->execute($values);
        if ($res) {
            //$url = "localhost/activate.php?email=".$email."&code=".$code."";
            //$to = $email;
           // $subject = "Please activate your account!";
            //$message = 'Activate your account:  <a href="'.$url.'">'.$url.'</a>';
            //$from = "rXiFwd4Djr@gmail.com";
            //$headers = "From: ".$from."\r\n";
            //$headers .= "MIME-Version: 1.0\r\n";
            //$headers .= "Content-type: text/html\r\n";
            //mail($to,$subject,$message,$headers);
            $final = "Account successfully created!";
        }
        else {
            $errors[] = "Some error occurred.";
        }
    }
}
?>
<form action="register.php" method="POST" id="register" style="padding: 20px; color: white;">
<?php
    if(!empty($final)) {
        echo '<p style="color: #63b28c;">'.$final.'</p>';
    }
?>
<h1 style="position:relative; right:-120px;">Register</h1><br>
<label for="username">Username</label><br>
<input id="25662"style="width: 400px;background-color: #1b1e21; border: 1px solid grey;color: white;" class="form-control" type="text" name="username" placeholder="Username" aria-label="username"><a href="#" title="" onclick="user(); return false;">Generate anonymous username.</a><br><br>
<label for="username">Email</label><br>
<input style="width: 400px;background-color: #1b1e21; border: 1px solid grey;color: white;" class="form-control" type="text" name="email" placeholder="Email" aria-label="email"><br>
<label for="username">Password</label><br>
<input style="width: 400px;background-color: #1b1e21; border: 1px solid grey;color: white;" class="form-control" id="89263" type="text" name="password" placeholder="Password" aria-label="password"><br><a href="#" title="" onclick="gen(); return false;">Generate secure password.</a><br><br><a href="#" title="" onclick="copy(); return false;">Copy password to clipboard.</a><br><br>
<label for="username">Confirm Password</label><br>
<input style="width: 400px;background-color: #1b1e21; border: 1px solid grey;color: white;" class="form-control" id="77614"type="text" name="password2" placeholder="Repeat password"><br>
<input style="width: 400px;background-color: #1b1e21; border: 1px solid grey;color: white;" type="submit" class="btn btn-primary" value="Register">
<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?? '' ?>">
</form>
<?php
if(!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: #ba414b; margin-left: 20px">'.htmlspecialchars($error).'</p>';
    }
}
?>