@extends('layouts.themalogin')

@section('content')
<title>Maps</title>

<body>
    <div style="width: 640px; height: 480px" id="mapContainer"></div>
    <script>
        // Initialize the platform object:
        var platform = new H.service.Platform({
            'apikey': 'IVJAoId74jSrs2k7XPZJQS5NJNLQlTYgrtuM_L0KpBc'
        });

        // Obtain the default map types from the platform object
        var maptypes = platform.createDefaultLayers();
        var svgMarkup = '<svg width="24" height="24" ' +
            'xmlns="http://www.w3.org/2000/svg">' +
            '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" ' +
            'height="22" /><text x="12" y="18" font-size="12pt" ' +
            'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
            'fill="white">H</text></svg>';
        // Instantiate (and display) a map object:
        var map = new H.Map(
            document.getElementById('mapContainer'),
            maptypes.vector.normal.map, {
                zoom: 17,
                center: {
                    lng: 5.387480,
                    lat: 52.157250
                }

            });
        var icon = new H.map.Icon(svgMarkup);

        // Create a marker using the previously instantiated icon:
        var marker = new H.map.Marker({
            lng: 5.387480,
            lat: 52.157250
        }, {
            icon: icon
        });

        // Add the marker to the map:
        map.addObject(marker);
    </script>
</body>

@endsection