<?php

$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdl/material.min.css">
    <script src="mdl/material.min.js"></script>
    <style>
    .demo-card-event.mdl-card {
      width: 100%;
      height: 256px;
      background: #263238;
      margin-bottom:5px;
    }
    .demo-card-event > .mdl-card__actions {
      border-color: rgba(255, 255, 255, 0.2);
    }
    .demo-card-event > .mdl-card__title {
      align-items: flex-start;
    }
    .demo-card-event > .mdl-card__title > h4 {
      margin-top: 0;
      background: rgba(0,0,0,0.5)
    }
    .demo-card-event > .mdl-card__actions {
      display: flex;
      box-sizing:border-box;
      align-items: center;
    }
    .demo-card-event > .mdl-card__actions > .material-icons {
      padding-right: 10px;
    }
    .demo-card-event > .mdl-card__title,
    .demo-card-event > .mdl-card__actions,
    .demo-card-event > .mdl-card__actions > .mdl-button {
      color: #fff;
    }
    .page-content {padding:10px}
    </style>
    <title></title>
  </head>
  <body>



<!-- No header, and the drawer stays open on larger screens (fixed drawer). -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

<?php include 'navbar.php'; ?>

<main class="mdl-layout__content">
  <div class="page-content">




     <!-- <div class="demo-card-event mdl-card mdl-shadow--2dp">
       <div class="mdl-card__title mdl-card--expand" style="background:url('images/pizza1.jpg')">
         <h4>
           ANGEBOT<br>
           11.-  €
         </h4>
       </div>
       <div class="mdl-card__actions mdl-card--border">
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"> Add</button>
         <div class="mdl-layout-spacer"></div>
         11.-  €
       </div>
     </div> -->


<?php

$condition = "";
if (isset($_GET['cid'])) {
  $condition = " WHERE id_categorie ='".$_GET['cid']."'";
}

$result_one = $file_db->query("SELECT * FROM menu $condition");
foreach($result_one as $row) {
 // print_r($row);
 $image = ($row['image']== ''?'':'style="background:url(\'images/'.$row['image'].'\');background-size:cover"');
 print '<div class="demo-card-event mdl-card mdl-shadow--2dp">';
 print '<div class="mdl-card__title mdl-card--expand" '.$image.'>';
 print '<h4>'.$row['nom'].'</h4> </div>';
 print ' <div class="mdl-card__actions mdl-card--border">';
 print '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="ajouterAuPanier('.$row['id'].')"><i class="material-icons">add_shopping_cart</i></button>';
 print ' <div class="mdl-layout-spacer"></div>';
 print  $row['prix'].' €</div></div>';
}



 ?>







  </div>

  <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
</main>
<script src="js/frequency.js" charset="utf-8"></script>
<script type="text/javascript">

function ajouterAuPanier(id){
frequency.post('data/ajouteraupanier.php','mid='+id,function(re){
  console.log(re);
notification('commande ajoutée , montant '+re +'€');
})

}


function notification(txt) {
  var snackbarContainer = document.querySelector('#demo-toast-example');
  var data = {message: txt};
  snackbarContainer.MaterialSnackbar.showSnackbar(data);
}
</script>
</div>
