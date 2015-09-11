<?php
require("db.php");

if (isset($_POST['hir'])){
$hir = $_POST['hir'];
}

try {
$stmt = $db->prepare(
'INSERT INTO
  hirek (hir)
VALUES (:hir)
ON DUPLICATE KEY UPDATE
 likes=likes+1;') ;

$stmt->bindParam(":hir", $hir, PDO::PARAM_STR);

$stmt->execute();


} catch(PDOException $e) {
		echo $e->getMessage();
}

 ?>
