<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$db = $hd->prepare("SELECT * FROM users");
$db->execute();
$f = $db->fetchAll();
?>
<body>
<div style="padding: 10px; color: white;">
<table class="table table-dark table-striped" style="width: 100%; color: white;">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">created_at</th>
      <th scope="col">activated</th>
      <th scope="col">is_admin</th>
      <th scope="col">is_banned</th>
    </tr>
  </thead>
  <tbody id="14842">
  <?php
      foreach ($f as $e) {
        $t_f = $e['active'] ? 'true' : 'false';
        if ($t_f == 'true') {$color = '#51ef7b';} else {$color = '#d32a2d';}
        $t_f2 = $e['is_admin'] ? 'true' : 'false';
        if ($t_f2 == 'true') {$color2 = '#51ef7b';} else {$color2 = '#d32a2d';}
        $t_f3 = $e['is_banned'] ? 'true' : 'false';
        if ($t_f3 == 'true') {$color3 = '#51ef7b';} else {$color3 = '#d32a2d';}
        echo '<tr><td style="color: #a09d9d;">'.htmlspecialchars($e['id']).'</td><td>'.htmlspecialchars($e['username']).'</td><td>'.htmlspecialchars($e['created_at']).'</td><td style="color: '.$color.';">'.$t_f.'</td><td style="color: '.$color2.';">'.$t_f2.'</td><td style="color: '.$color3.'">'.$t_f3.'</td></tr>';
      }
    ?>
  </tbody>
</table>
</div>
</body>