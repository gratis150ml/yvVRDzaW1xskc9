<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
}
if ($_SESSION['login'] == true) {
    $ret = (boolean)$_SESSION['is_admin'] ? 'true' : 'false';
    echo '<div style="padding: 5px;"><form action="post.php" method="POST"
     style="padding: 10px; border:#353535; border-width:1px; border-style:solid;
      width: 1022px;"><h5>Title:</h5><input class="form-control" style="background-color: #1b1e21;
       color: white; width: 1000px;" type="text" name="title" maxlength="80" minlength="4" aria-label="title" required><br><br><label
        for="message" class="form-label">Message: </label><textarea class="form-control"style="width: 1000px;
         height: 300px; background-color: #1b1e21; color: white;"class="form-control"
          rows="3" aria-label="message" name="message" required></textarea><br><label for="password">Password</label><br>
    <input style="width: 400px;background-color: #1b1e21; border: 1px solid grey;color:
     white;" class="form-control" id="89263" type="text" name="password" placeholder="Password"
      aria-label="password"><br><a href="#" title="" onclick="gen(); return false;">
      Generate secure password.</a><br><br><a href="#" title="" onclick="copy(); return false;">
      Copy password to clipboard.</a><br><br><br><input style="width: 1000px;background-color: #1b1e21;
       border: 1px solid grey;color: white" type="submit" class="btn btn-primary" value="Post"><input type="hidden" name="csrf" value="'.$_SESSION['csrf'].'"></form></div>';
    echo '<div><h4 style="padding: 10px;">All my posts: </h4></div>';
    $sql = "SELECT * FROM posts WHERE owner=:username";
    $db = $hd->prepare($sql);
    $values = array(':username'=>$_SESSION['username']);
    $result = $db->execute($values);
    $f = $db->fetchAll();
    echo '<div style="padding: 5px; color: white;">
<table class="table table-dark table-striped" style="width: 61.7%; color: white;">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">views</th>
      <th scope="col">is_locked</th>
      <th scope="col">created_at</th>
      <th scope="col">url</th>
    </tr>
  </thead>
  <tbody id="1484">';
  foreach ($f as $e) {
    $url = "localhost/view.php?id=".$e['id'];
    $fuck = "/view.php?id=".$e['id'];
    $t_f = $e['is_locked'] ? 'true' : 'false';
    if ($t_f == 'true') {$color = '#51ef7b';} else {$color = '#d32a2d';}
    echo '<tr><td style="color: #a09d9d;">'.htmlspecialchars($e['title']).'</td><td>'.htmlspecialchars($e['views']).'</td><td style="color: '.$color.'">'.htmlspecialchars($t_f).'</td><td>'.htmlspecialchars($e['created_at']).'</td><td><a href="'.htmlspecialchars($fuck).'">'.htmlspecialchars($url).'</a></td></tr>';
  }
} else {
    echo '<p class="font-monospace"style="color: #ba414b; padding: 10px;">You are not logged in buddy.</p>';
}
?>

