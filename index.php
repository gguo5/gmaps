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
            var infoWindow;
            var message = ['This', 'is', 'the', 'secret', 'message'];

            function initialize() {
                var mapDiv = document.getElementById('map-canvas');
                map = new google.maps.Map(mapDiv, {
                    center: new google.maps.LatLng(37.4419, -122.1419),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                infoWindow = new google.maps.InfoWindow();

                google.maps.event.addListenerOnce(map, 'tilesloaded', addMarkers);
            }

            function addMarkers() {
                var bounds = map.getBounds();
                var southWest = bounds.getSouthWest();
                var northEast = bounds.getNorthEast();
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();

                function createMarker(map, position, number) {
                    var marker = new google.maps.Marker({
                        position: position,
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        var myHtml = '<strong>#' + number + '</strong><br/>' + message[number - 1];
                        infoWindow.setContent(myHtml);
                        infoWindow.open(map, marker);
                    });
                }

                for (var i = 1; i <= 5; i++) {
                    var latLng = new google.maps.LatLng(southWest.lat() + latSpan * Math.random(),
                    southWest.lng() + lngSpan * Math.random());

                    createMarker(map, latLng, i);
                }
            }
​
        </script>

    </head>
    <body>
        <div id="map_canvas" style="width:100%; height:100%"></div> 
    </body>
</html>