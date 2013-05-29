<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <style type="text/css">
            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map_canvas { height: 100% }
        </style>
        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBNoi1OiLgZh3et2pgEE_uZPmhw_xiifjw&sensor=true">
        </script>
         <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>    
        <script type="text/javascript">
            var map;
            function initialize() {
                var mapOptions = {
                    center: new google.maps.LatLng(58, 16),
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map_canvas"),
                mapOptions);
            }
            
            $(document).ready(function() {
                $.getJSON("foo.json", function(results) {
                    for (var i = 0; i < results.features.length; i++) {
                        var place = results.features[i];
                        var coords = place.coordinates;
                        var latLng = new google.maps.LatLng(coords[0],coords[1]);
                        var marker = new google.maps.Marker({
                            position: latLng,
                            title: place.title
                        });
                        marker.setMap(map);
                    }
                });
            });       
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
       
    </head>
    <body>
        <div id="map_canvas" style="width:100%; height:100%"></div> 
    </body>
</html>