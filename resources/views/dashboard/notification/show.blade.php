<x-dashboard-layout title="Информация об уведомлении">
    <x-dashboard-header-small pretitle="Информация" title="Уведомления">
        <a href="{{ route('notifications.index') }}" class="btn btn-primary lift">Назад</a>
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
                                    <img src="{{ asset($notification->data->img_path) }}" alt="..." class="img-fluid rounded" style="height: 400px;">
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
                                    Информация
                                </h4>

                            </div>
                            <div class="card-body mt-0">

                                <!-- Features -->
                                <div class="mb-3">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Загаловка</small> <small>{{ $notification->data->title }}</small>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Получитель (Пользователь)</small> <small>{{ $notification->data->user }}</small>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Время отправки</small> <small>{{ $notification->created_at }}</small>
                                        </li>

                                    </ul>
                                </div>

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
                                            Сообщение
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{ $notification->data->message }}
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-message-square text-muted mb-0"></span>

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
