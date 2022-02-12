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
    }}
if(isset($_POST) & !empty($_POST)) {
    if(empty($_POST['username'])) {
        $errors[] = "Email or username is required.";
    }
    if(empty($_POST['password'])) {
        $errors[] = "Password is required.";
    }
    if(filter_var(filter_var($_POST['username'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
        $sql = "SELECT * FROM users WHERE email=:username";
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM users WHERE username=:username";
    }
    if (!empty($_POST['password']) & !empty($username)) {
        $db = $hd->prepare($sql);
        $values = array(':username'=>$username);
        $result = $db->execute($values);
        $retard = $db->rowCount();
        $f = $db->fetchAll();
        if(!$retard==1) {
            $errors[] = "Email or username doesn't exist.";
        } else {
            if(!password_verify($_POST['password'], $f[0]['password'])){
                $errors[] = "Incorrect password.";
            } else {
                if((int)$f[0]['active']==0){
                    $errors[] = "Account isn't active, please verify your email.";
                }
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
    if (empty($errors)){
        session_regenerate_id();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $f[0]['username'];
        $_SESSION['id'] = $f[0]['id'];
        $_SESSION['email'] = $f[0]['email'];
        $_SESSION['last_login'] = date('Y-m-d H:i:s');
        if ((int)$f[0]['is_admin']===1) {
            $_SESSION['is_admin'] = true;
        } else {
            $_SESSION['is_admin'] = false;
        }
        header("location: dashboard.php");
    }

    
}
?>

<form action="login.php" method="POST" id="login" style="padding: 20px; color: white;">
<h1 style="position:relative; right:-140px;">Login</h1><br>
<label for="username">Email or username</label><br>
<input style="width: 400px;background-color: #1b1e21;border: 1px solid grey;color: white;"class="form-control"type="text" name="username" placeholder="Username" aria-label="username"><br>
<label for="username">Password</label><br>
<input style="width: 400px;background-color: #1b1e21;border: 1px solid grey;color: white;"class="form-control"type="password" name="password" placeholder="Password" aria-label="password"><br>      
<input style="width: 400px;background-color: #1b1e21;border: 1px solid grey;color: white;"class="btn btn-primary"type="submit" value="Login">
<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?? '' ?>">
</form>
<?php
if(!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: #ba414b; margin-left: 20px">'.htmlspecialchars($error).'</p>';
    }
}
?>