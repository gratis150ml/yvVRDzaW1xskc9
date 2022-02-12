<?php
include "ySBygAiZxjA3Izh.php";
include "yhNHCp9TazUyVUU.php";
global $hd;
$db = $hd->prepare("SELECT * FROM posts");
$db->execute();
$f = $db->fetchAll();
?>
<body>
<div style="padding: 10px; color: white;">
<table class="table table-dark table-striped" style="width: 100%; color: white;">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">owner</th>
      <th scope="col">is_locked</th>
      <th scope="col">title</th>
      <th scope="col">url</th>
      <th scope="col">created_at</th>
      <th scope="col">views</th>
    </tr>
  </thead>
  <tbody id="14842">
  <?php
      foreach ($f as $e) {
        $url = "localhost/view.php?id=".$e['id'];
        $fuck = "/view.php?id=".$e['id'];           
        $t_f = $e['is_locked'] ? 'true' : 'false';
        if ($t_f == 'true') {$color = '#51ef7b';} else {$color = '#d32a2d';}
        echo '<tr><td style="color: #a09d9d;">'.htmlspecialchars($e['id']).'</td><td>'.htmlspecialchars($e['owner']).'</td><td style="color: '.$color.'">'.htmlspecialchars($t_f).'</td><td>'.htmlspecialchars($e['title']).'</td><td><a href="'.htmlspecialchars($fuck).'">'.htmlspecialchars($url).'</a></td><td>'.htmlspecialchars($e['created_at']).'</td><td>'.htmlspecialchars($e['views']).'</td></tr>';
      }
    ?>
  </tbody>
</table>
</div>
</body>