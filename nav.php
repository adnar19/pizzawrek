
<div style="width:100%;height:50px;background:#ffeb3b;">
<button id=""
        class="mdl-button mdl-js-button mdl-button--icon" style="margin-right:250px;margin-top:10px;">
<a href="index.php">  <i class="material-icons">navigate_before</i></a>
</button>

  <button id=""
          class="mdl-button mdl-js-button mdl-button--icon" style="margin-top:10px;">
  <a href="panier.php">    <i class="material-icons">add_shopping_cart</i></a>
  </button>
  <button id="demo-menu-lower-right"
          class="mdl-button mdl-js-button mdl-button--icon bp"style="margin-left: 10px;margin-top:10px;">
    <i class="material-icons">more_vert</i>
  </button>

  <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
      for="demo-menu-lower-right" >
    <li class="mdl-menu__item" > <a href="description.php">A propos</a></li>
    <li onclick="fermer()" class="mdl-menu__item">Exit</li>
  </ul>
</div>


<script type="text/javascript">
   function fermer() {
     window.close();
   }
</script>
