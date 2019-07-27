<?php

$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");
$gid =$_COOKIE['gid'];



if (isset($_GET['trash']) && $_GET['trash'] > 0)  {
$trashid= $_GET['trash'];
  $file_db->exec("DELETE FROM panier WHERE id='$trashid'");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdl/material.min.css">
    <script src="mdl/material.min.js"></script>
    <style>

table.panier {width:100%;}
table.panier tr td{padding:8px;}
.page-content{padding:8px;}
    </style>
    <title></title>
  </head>
  <body>



<!-- No header, and the drawer stays open on larger screens (fixed drawer). -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

<?php include 'navbar.php'; ?>

<main class="mdl-layout__content">
  <div class="page-content">




<table class="panier">
  <tr>
    <td>quantite</td>
    <td>description</td>
    <td>montant</td>
    <td>trash</td>
  </tr>

  <?php
$montant = 0;
  $result_one = $file_db->query("SELECT panier.id,panier.quantite,panier.prix,panier.montant,menu.nom FROM panier left join menu on menu.id=panier.id_menu WHERE gid='$gid' AND confirme='0'");
  foreach($result_one as $row) {
   // print_r($row);
   $montant += ($row['quantite'] * $row['prix']);
   print '<tr><td>'.$row['quantite'].'</td><td>'.$row['nom'].'</td><td>'.$row['montant'].'</td><td><a class="mdl-navigation__link" href="?trash='.$row['id'].'"><i class="material-icons">delete</i></a> </td></tr>';

  }

  print '<tr><td colspan="2">TOTAL</td> <td colspan="2"><h3><b> '.$montant.' €</b></h3></td></tr>';
   ?>
</table>


<hr>

<div class="conf">

<div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="nom">
  <label class="mdl-textfield__label" for="nom">Nom...</label>
</div>
<div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="adresse">
  <label class="mdl-textfield__label" for="adresse">adresse...</label>
</div>
<div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="tel">
  <label class="mdl-textfield__label" for="tel">telephone...</label>
</div>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"onclick="Confirmer(this)">
  Confirmer
</button>

</div>




<hr>
<h3>Mes commandes</h3>
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Date</th>
      <th>Montant</th>
      <th>Etat</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $result_one = $file_db->query("SELECT * FROM commande WHERE gid='$gid'");
    foreach($result_one as $row) {
 print '<tr><td class="mdl-data-table__cell--non-numeric">'.$row['date'].'</td>  <td>'.$row['montant'].'</td><td>'.$row['etat'].'</td></tr>';
    }



     ?>

    <!-- <tr>
      <td class="mdl-data-table__cell--non-numeric">Acrylic (Transparent)</td>
      <td>25</td>
      <td>$2.90</td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">Plywood (Birch)</td>
      <td>50</td>
      <td>$1.25</td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">Laminate (Gold on Blue)</td>
      <td>10</td>
      <td>$2.35</td>
    </tr> -->
  </tbody>
</table>








  </div>
</main>
<script src="js/frequency.js" charset="utf-8"></script>
<script type="text/javascript">
  document.getElementById('nom').value = localStorage.nom;
  document.getElementById('adresse').value = localStorage.adresse;
  document.getElementById('tel').value = localStorage.tel;

  function Confirmer(boutton) {
    var nom = document.getElementById('nom').value ,adresse = document.getElementById('adresse').value,tel = document.getElementById('tel').value,gid = '<?php print $_COOKIE['gid']; ?>';
frequency.post('data/confirmer.php','nom='+nom+'&adresse='+adresse+'&tel='+tel+'&gid='+gid,function(l){
  console.log(l);
boutton.remove();
document.querySelector('.conf').remove();
})
  }



</script>
</div>
