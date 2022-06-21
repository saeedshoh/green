<x-dashboard-layout title="Добавление точки">
    <x-dashboard-header-small pretitle="Новая" title="Точка">
        <a href="{{ route('places.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('places.update', $place->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation mb-4" accept-charset="utf-8">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title', $place->title) }}" placeholder="Введите название точки" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6  mb-3">
                            <label for="imageInput" class="form-label">Изображение</label>
                            <input type="file" name="image" class="form-control" id="imageInput" value="{{ old('image') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="addressInput" class="form-label">Адрес</label>
                            <input type="text" name="address" class="form-control" id="addressInput" value="{{ old('address', $place->address) }}" placeholder="Введите адреса точки" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="pointsPerVisitInput" class="form-label">Количество баллов за посещение</label>
                            <input type="number" name="points_per_visit" class="form-control" id="pointsPerVisitInput" value="{{ old('points_per_visit', $place->points_per_visit) }}" placeholder="Введите баллов за посещение" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="phoneInput" class="form-label">Телефон</label>
                            <input type="text" name="phone" class="form-control" id="phoneInput" value="{{ old('phone', $place->phone) }}" placeholder="Введите номер телефона точки" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="hoursInput" class="form-label">Режим работы</label>
                            <input type="text" name="working_hours" class="form-control" id="hoursInput" value="{{ old('working_hours', $place->working_hours) }}" placeholder="Введите номер телефона точки" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="groupSelect">Категория</label>
                            <select name="category_id" class="form-control" id="groupSelect" required>
                                <option value @unless(old('category_id')) selected @endunless disabled>Выберите категории</option>
                                @foreach ($categories as $category)
                                    <option @if (old('category_id') == $category->id || $place->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="addressInput" class="form-label">Выберите расположение точки на карте</label>
                            <div id="map" style="height: 400px"> </div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="latInput" class="form-label">Ширина</label>
                            <input readonly type="text" name="lat" class="form-control" id="latInput" value="{{ old('lat', $place->lat) }}" placeholder="*.*************" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="lngInput" class="form-label">Долгота</label>
                            <input readonly type="text" name="lng" class="form-control" id="lngInput" value="{{ old('lng', $place->lng) }}" placeholder="*.*************" maxlength="100" required autofocus>
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
                document.getElementById("latInput").value = event.latLng.lat()
                document.getElementById("lngInput").value = event.latLng.lng()

            });
        }
        window.initMap = initMap;
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
</x-dashboard-layout>
