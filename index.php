<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="A page to show flooded area in Myanmar" />
    <meta property="og:site_name" content="Crowdsourced Map"/>
    <meta property="og:url" content="http://aungmt.com/yaygyi/" />
    <meta property="og:description" content="Each of you can help to collect the data of which area of Myanmar are flooded. Visualization layer is also created to provide people better idea and up to date information. I hope this will be helpful and useful for ordinary people as well as people who want to send help and donation to Myanmar." />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Each of you can help to collect the data of which area of Myanmar are flooded. Visualization layer is also created to provide people better idea and up to date information. I hope this will be helpful and useful for ordinary people as well as people who want to send help and donation to Myanmar.">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Area affected</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/sticky-footer-navbar.css" rel="stylesheet">

    <style>
html { height: 100% }
body { height: 100% }
#map-container { height: 100% }
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=visualization"></script>
    <script>
// Adding 500 Data Points
var map, pointarray, heatmap;

<?php
      include "getPoints.php";
    ?>


function initialize() {
  var mapOptions = {
    zoom: 6,
    center: new google.maps.LatLng(19.829667, 95.967915)
  };

  map = new google.maps.Map(document.getElementById('map-container'),
      mapOptions);

  var pointArray = new google.maps.MVCArray(mapData);

  heatmap = new google.maps.visualization.HeatmapLayer({
    data: pointArray
  });

  heatmap.setMap(map);
}

function toggleHeatmap() {
  heatmap.setMap(heatmap.getMap() ? null : map);
}

function changeGradient() {
  var gradient = [
    'rgba(0, 255, 255, 0)',
    'rgba(0, 255, 255, 1)',
    'rgba(0, 191, 255, 1)',
    'rgba(0, 127, 255, 1)',
    'rgba(0, 63, 255, 1)',
    'rgba(0, 0, 255, 1)',
    'rgba(0, 0, 223, 1)',
    'rgba(0, 0, 191, 1)',
    'rgba(0, 0, 159, 1)',
    'rgba(0, 0, 127, 1)',
    'rgba(63, 0, 91, 1)',
    'rgba(127, 0, 63, 1)',
    'rgba(191, 0, 31, 1)',
    'rgba(255, 0, 0, 1)'
  ]
  heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
}

function changeRadius() {
  heatmap.set('radius', heatmap.get('radius') ? null : 20);
}

function changeOpacity() {
  heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>


  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Flooded areas</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="location.html">Send Location Data</a></li>
            <li><a href="contact.html">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->    
          <div id="map-container"></div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted" id="footer-count"></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

    <script>      
      $( "#footer-count" ).load( "getContributions.php" );
    </script>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/ie10-viewport-bug-workaround.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54996038-1', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>
