<!DOCTYPE html> 
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <style type="text/css">
            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map-canvas { height: 100% }

        </style>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNoi1OiLgZh3et2pgEE_uZPmhw_xiifjw&sensor=true">
        </script>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript">
          
            var map;
            
            function initialize() {
                
                var mapOptions = {
                    zoom: 8,//0-22
                    center: new google.maps.LatLng(-34.397, 150.644),//LatLng obj
                    mapTypeId: google.maps.MapTypeId.ROADMAP  //ROADMAP, SATELLITE, HYBRID, or TERRAIN
                };
                
                map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <div id="map-canvas"/>

    </body>
</html>



