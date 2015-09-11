<?php
require("db.php");

if (isset($_POST["page"]) &&
    !empty($_POST["page"])) {
  $page = (int)$_POST["page"];
}else{
  $page = 0;
}

$num = 10;

$stmt = $db->prepare(
"SELECT *
FROM hirek
ORDER BY likes DESC, hirID
DESC
LIMIT :page, :num");

$stmt->bindParam(":page", $page, PDO::PARAM_INT);
$stmt->bindParam(":num", $num, PDO::PARAM_INT);

$stmt->execute();


$count = $db->query('SELECT COUNT(*) as total FROM hirek');

$c = $count->fetch();
$remaining = $c['total'] - ($page + $num);




  while ($row = $stmt->fetch()){
    echo '
  <li class="list-group-item">
    <h3><b>'.$row["hir"].'</b>
      <button id="like" type="button" class="btn btn-primary">
        <span class="badge">'.$row["likes"].'</span>
        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
      </button>
    </h3>
  </li>';
  }
  echo "<script> remaining = $remaining </script>";

 ?>
