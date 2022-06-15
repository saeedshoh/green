<x-dashboard-layout title="Информация о призе">
    <x-dashboard-header-small pretitle="Информация" title="Приз">
        <a href="{{ route('gifts.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <!-- Card -->
                <div class="card">
                    <div class="card-body text-center">

                        <!-- Avatar -->
                        <div class="mx-auto">
                            <img src="{{ asset($gift->image) }}" alt="..." class="img-fluid rounded" style="height: 300px;">
                        </div>

                        <!-- Title -->
                        <h2 class="card-title  mt-5">
                            <span>{{ $gift->title }}</span>
                        </h2>

                        <!-- Text -->
                        <p class="card-text text-muted">
                            {{ $gift->description }}
                        </p>

                    </div>
                    <div class="card-footer card-footer-boxed">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <i class="fe fe-clock"></i> Время создание:  {{ $gift->created_at }}
                                </p>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-dashboard-layout>
