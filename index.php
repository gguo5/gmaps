<!DOCTYPE html>
<html>
    <head>
        <title>Styling the Base Map</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            html, body, #map_canvas {
                margin: 0;
                padding: 0;
                height: 100%;
            }
            #legend {
                font-family: Arial, sans-serif;
                background: #fff;
                padding: 10px;
                margin: 10px;
                border: 3px solid #000;
            }
            #legend h3 {
                margin-top: 0;
            }
            #legend img {
                vertical-align: middle;
            }
        </style>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNoi1OiLgZh3et2pgEE_uZPmhw_xiifjw&sensor=true"></script>
        <script>
            var map;
            function initialize() {
                map = new google.maps.Map(document.getElementById('map_canvas'), {
                    zoom: 16,
                    center: new google.maps.LatLng(-37.87753,145.043263),//set latlng -37.877199,145.045173 for monash caulfield  -33.91722, 151.23064 nsw
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles:  [
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [
                { color: '#000000' },
                { weight: 1.6 }
              ]
            }, {
              featureType: 'road',
              elementType: 'labels',
              stylers: [
                { saturation: -100 },
                { invert_lightness: true }
              ]
            }, {
              featureType: 'landscape',
              elementType: 'geometry',
              stylers: [
                { hue: '#ffff00' },
                { gamma: 1.4 },
                { saturation: 82 },
                { lightness: 96 }
              ]
            }, {
              featureType: 'poi.school',
              elementType: 'geometry',
              stylers: [
                { hue: '#fff700' },
                { lightness: -15 },
                { saturation: 99 }
              ]
            }, {
              featureType: 'poi',
              elementType: 'geometry',
              stylers: [
                { visibility: 'off' }
              ]
            }, {
              featureType: 'poi.school',
              elementType: 'geometry',
              stylers: [
                { visibility: 'on' },
                { hue: '#fff700' },
                { lightness: -15 },
                { saturation: 99 }
              ]
            }
          ]//end map styles
                });//end creating map

                var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                var icons = {
                    parking: {
                        name: 'Parking',
                        icon: iconBase + 'parking_lot_maps.png',
                        shadow: iconBase + 'parking_lot_maps.shadow.png'
                    },
                    library: {
                        name: 'Library',
                        icon: iconBase + 'library_maps.png',
                        shadow: iconBase + 'library_maps.shadow.png'
                    },
                    info: {
                        name: 'Info',
                        icon: iconBase + 'info-i_maps.png',
                        shadow: iconBase + 'info-i_maps.shadow.png'
                    }
                };//end creating icons

                function addMarker(feature) {
                   
                    var marker = new google.maps.Marker({
                        position: feature.position,
                        icon: icons[feature.type].icon,
                        shadow: {
                            url: icons[feature.type].shadow,
                            anchor: new google.maps.Point(16, 34)
                        },
                        map: map
                    });
                }

               var features = [
                 {
                        position: new google.maps.LatLng(-37.877174,145.045034),//monash
                        type: 'info'
                    }, {
                        position: new google.maps.LatLng(-37.877398,145.04373),//monash
                        type: 'info'
                    }, {
                        position: new google.maps.LatLng(-37.87692,145.044009),//monash parking
                        type: 'parking'
                    }, {
                        position: new google.maps.LatLng(-37.876678,145.044905),//monash parking
                        type: 'parking'
                    }, {
                        position: new google.maps.LatLng(-37.876484,145.043199),//monash parking
                        type: 'parking'
                    }, {
                        position: new google.maps.LatLng(-37.876869,145.042952),//monash parking
                        type: 'parking'
                    }, {
                        position: new google.maps.LatLng(-37.877351,145.045496),//monash lib
                        type: 'library'
                    }
                    
                ];

                for (var i = 0, feature; feature = features[i]; i++) {
                    addMarker(feature);
                }


                var legend = document.getElementById('legend');
                for (var key in icons) {
                    var type = icons[key];
                    var name = type.name;
                    var icon = type.icon;
                    var div = document.createElement('div');
                    div.innerHTML = '<img src="' + icon + '"> ' + name;
                    legend.appendChild(div);
                }

                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
                
              
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <div id="map_canvas"></div>
        <div id="legend"><h3>Legend</h3></div>
    </body>
</html>
