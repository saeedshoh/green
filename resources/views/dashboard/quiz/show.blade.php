<x-dashboard-layout title="Информация об опросе">
    <x-dashboard-header-small pretitle="Информация" title="Опрос">
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary lift">Назад</a>
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
                                    Вопрос
                                </h4>

                            </div>
                            <div class="card-body text-center">

                                <i>{{ $quiz->title }}</i>


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
                            <div class="card-body">

                                <!-- Features -->
                                <div class="mb-3">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Кол.во баллов за прохождение</small> <small>{{ $quiz->points_for_passing }}</small>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Начало</small> <small>{{ $quiz->start }}</small>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Окончание</small> <small>{{ $quiz->ending }}</small>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                            <small>Статус</small> <small>
                                                @if ($quiz->deleted_at == null)
                                                    <span class="item-score badge bg-success-soft">Активный</span>
                                                @else
                                                    <span class="item-score badge bg-danger-soft">Неактивный</span>
                                                @endif
                                            </small>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                    <p class="text-muted mb-4">
                        Варианты ответов
                    </p>
                    <div class="col-12">
                        @forelse ($quiz->variants as $variant)
                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h6 class="text-uppercase text-muted mb-2">
                                                Вариант #{{ $loop->iteration }}
                                            </h6>

                                            <!-- Heading -->
                                            <span class="h2 mb-0">
                                                {{ $variant->title }}
                                            </span>

                                        </div>
                                        <div class="col-auto">

                                            <!-- Icon -->
                                            <span class="h2 fe fe-help-circle text-muted mb-0"></span>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                            </div>
                        @empty
                        @endforelse


                    </div>
                </div>

            </div>
        </div>
    </div>

</x-dashboard-layout>
