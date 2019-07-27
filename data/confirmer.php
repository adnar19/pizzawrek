<?php
$nom = $_POST['nom'];
$adr = $_POST['adresse'];
$tel = $_POST['tel'];
$gid = $_POST['gid'];
$date = date('Y-m-d H:i:s');

$dbname =   __DIR__ . '/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$mnt = 0;
$result_one = $file_db->query("SELECT *  FROM panier WHERE gid='$gid' ") ;
foreach($result_one as $row) {
$mnt+= $row['prix'];
}
print $gid;
 $file_db->query("INSERT INTO commande (gid,montant,temps,date,etat) VALUES ('$gid','$mnt','','$date','0') ") or  print_r($file_db->errorInfo());

$file_db->query("UPDATE  panier SET confirme='1'  WHERE gid='$gid' ") ;


 ?>
