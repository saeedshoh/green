<x-dashboard-layout title="Метки на карте">
    <x-dashboard-header-small pretitle="Обзор" title="Метки на карте">
        {{-- <a href="{{ route('quizzes.create') }}" class="btn btn-primary lift">Добавить</a> --}}
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div id="map" style="height: 700px"> </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        function initMap() {
            const myLatLng = {
                lat: 38.576271,
                lng: 68.779716
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: myLatLng,
            });

            var locations = {!! $marks !!}



            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            var markers = [];

            for (i = 0; i < locations.length; i++) {
                console.log(locations);
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                    map: map
                });

                markers.push(marker);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i]['title']);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
        window.initMap = initMap;
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
</x-dashboard-layout>
