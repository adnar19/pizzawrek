<?php
include 'nav.php'
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="mdl/material.min.css">
     <script src="mdl/material.min.js"></script>
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

     <title></title>
   </head>
   <body style="background:#fff176">



     <div class="demo-card-square mdl-card mdl-shadow--2dp" style="margin-left: 20px;margin-top: 20px; width: 320px; height: 200px;">
       <div class="mdl-card__title mdl-card--expand" style="color:white;background:url('images/pizza2.jpg') bottom right 40% no-repeat;">
       </div>
       <div class="mdl-card__supporting-text">
        <i class="material-icons" style="color:red">local_restaurant</i>Pizza thon <hr>
      sauce tomate,olive, thon
       </div>

</div>

<div class="demo-card-square mdl-card mdl-shadow--2dp" style="margin-left: 20px;margin-top: 20px; width: 320px;">
  <div class="" style="background:red;width:100%;height:40px;color:white">
    <strong class="mdl-card__title-text"  >Prix</strong>

  </div>
  <div class="mdl-card__supporting-text">
    <input type="radio" value="" > L 500DA<br>
    <input type="radio" value=""> XL 850DA<br>
    <input type="radio" value=""> XXL1300DA

<h5 style="color:red"> Quantité: </h5> <hr>

<div class="" style="position:inline-block;">

<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" style="background:red">
  <i class="material-icons">add</i>
</button>

<input type="number" size="2" value="1"  >

<!-- Colored FAB button with ripple -->
<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"style="background:red">
  <i class="material-icons">-</i>
</button>

</div>

  </div>
</div>
<br>

<hr>

<h5 style="color:red;margin-left:20px"> total prix : </h5>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style="background:red;margin-left:20px;width:160px">
Ajouter
</button>

<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style="background:red;width:160px">
Annuler
</button>
</body>
</html>
