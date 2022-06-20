<x-dashboard-layout title="Информация о пользователе">
    <x-dashboard-header-small pretitle="Информация" title="Пользователь">
        <a href="{{ route('users.index') }}" class="btn btn-primary lift">Назад</a>
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
                                    <img src="{{ asset($user->avatar) }}" alt="..." class="img-fluid rounded" style="height: 400px;">
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-6">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-muted mb-2">
                                            ФИО
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $user->name }}
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
                                            Пол
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $user->gender ? 'Мужской' : 'Женский' }}
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
                                            Дата рождения
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $user->birthday ?? 'Не установлен' }}
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
                                            Баллы
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $user->ball }}
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
                                            {{ $user->phone }}
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
                                            Статус
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            @if ($user->deleted_at == null)
                                                <span class="item-score badge bg-success-soft">Активный</span>
                                            @else
                                                <span class="item-score badge bg-danger-soft">Неактивный</span>
                                            @endif
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
