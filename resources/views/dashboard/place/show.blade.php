<x-dashboard-layout title="Информация о заведения">
    <x-dashboard-header-small pretitle="Информация" title="Заведения">
        <a href="{{ route('places.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12 col-lg-6">

                        <!-- Card -->
                        <div class="card card-fill">
                            <div class="card-header">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Изображения
                                </h4>

                            </div>
                            <div class="card-body text-center">

                                <!-- Avatar -->
                                <div class="mx-auto">
                                    <img src="{{ asset($place->image) }}" alt="..." class="img-fluid rounded" style="height: 400px;">
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-6">

                        <!-- Card -->
                        <div class="card card-fill">
                            <div class="card-header">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    QR-код
                                </h4>

                            </div>
                            <div class="card-body text-center">

                                {!! QrCode::size(300)->generate(url('/api/place/' . $place->id . '/click')) !!}

                            </div>
                        </div>

                    </div>
                    <div class="col-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            Название
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $place->title }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-edit-2 text-muted mb-0"></span>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            Категория
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $place->category->title ?? '' }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-grid text-muted mb-0"></span>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            Адрес
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $place->address }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-map-pin text-muted mb-0"></span>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>


                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            Режим работы
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $place->working_hours }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-clock text-muted mb-0"></span>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>


                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            Тел
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $place->phone }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-phone text-muted mb-0"></span>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>


                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            Кол.во баллов за посещение
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $place->points_per_visit }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-plus-circle text-muted mb-0"></span>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

</x-dashboard-layout>
