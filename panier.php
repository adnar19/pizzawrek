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


   <body style="background: #ffecb3; position: relative;">
<div class="" style="margin-top:30px;margin-left:15px;">

  <i class="material-icons">add_shopping_cart</i>
<strong> Votre panier:</strong>

<hr>
<i class="material-icons">local_taxi</i>
<strong> Frais de livraison: 300da</strong>
<hr>
<br>

<strong> Prix total: 300da</strong>
<br>
<br>

  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
  Confirmer commande
</button>
</div>


<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div id="map"></div>
</div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBERShUthQqBT0gGIoyIxtvtjmSwrflYS8&callback=initMap">


    function initMap() {

      var myLatLng = {
        lat: 52.078874,
        lng: 4.312620
      };

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: myLatLng
      });


    // Using the function to create multiple markers
      geocodeLatLng("52.077937, 4.311377","Apple Store","Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services.");
      geocodeLatLng("52.079572, 4.313265","Ridderzaal","The Ridderzaal is the main building of the 13th century Binnenhof in The Hague, Netherlands. It is used for the state opening of Parliament on Prinsjesdag, when the Dutch monarch drives to Parliament in the Golden Coach and delivers the speech from the throne. It is also used for official royal receptions, and interparliamentary conferences.")

    var infowindow = new google.maps.InfoWindow({maxWidth: 300});

      function geocodeLatLng(location,title,body) {
        var geocoder = new google.maps.Geocoder;
        var input = location;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });

              marker.addListener('click', function() {
                infowindow.setContent("<h3>" + title + "</h3>" + "<p>" + body + "</p>");
                infowindow.open(map, marker);
              });

            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }

    }



    initMap();


    </script>










   </body>
 </html>
