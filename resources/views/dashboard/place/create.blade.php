<x-dashboard-layout title="Добавление заведения">
    <x-dashboard-header-small pretitle="Новая" title="Заведения">
        <a href="{{ route('places.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="fullNameInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title') }}" placeholder="Введите название приза" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6  mb-3">
                            <label for="imageInput" class="form-label">Изображение</label>
                            <input type="file" name="image" class="form-control" id="imageInput" value="{{ old('image') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="pointsPerVisitInput" class="form-label">Количество баллов за посещение</label>
                            <input type="text" name="points_per_visit" class="form-control" id="pointsPerVisitInput" value="{{ old('points_per_visit') }}" placeholder="Введите баллов за посещение" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="phoneInput" class="form-label">Телефон</label>
                            <input type="text" name="phone" class="form-control" id="phoneInput" value="{{ old('phone') }}" placeholder="Введите номер телефона заведения" maxlength="100" required autofocus>
                        </div>

                        <div class="col mb-3">
                            <label for="addressInput" class="form-label">Адрес</label>
                            <input type="text" name="address" class="form-control" id="addressInput" value="{{ old('address') }}" placeholder="Введите адреса заведения" maxlength="100" required autofocus>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="addressInput" class="form-label">Выберите расположение заведения на карте</label>
                            <div id="map" style="height: 400px"> </div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="latInput" class="form-label">Ширина</label>
                            <input disabled type="text" name="address" class="form-control" id="latInput" value="{{ old('address') }}" placeholder="Введите адреса заведения" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="lngInput" class="form-label">Долгота</label>
                            <input disabled type="text" name="address" class="form-control" id="lngInput" value="{{ old('address') }}" placeholder="Введите адреса заведения" maxlength="100" required autofocus>
                        </div>
                    </div>

                    @if ($errors->any())
                        <ul class="list-group my-3">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <hr class="my-5">
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-lg btn-white">Очистить</button>
                        <button type="submit" class="btn btn-lg btn-primary">Добавить</button>
                    </div>
                </form>
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



            var marker;

            function placeMarker(location) {
                if (marker) {
                    marker.setPosition(location);
                } else {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
            }

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
                document.getElementById("latInput").value= event.latLng.lat()
                document.getElementById("lngInput").value= event.latLng.lng()

            });
        }
        window.initMap = initMap;
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
</x-dashboard-layout>
