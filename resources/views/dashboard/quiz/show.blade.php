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
                                    Название
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
                                            Название
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <span class="h2 fe fe-edit-2 text-muted mb-0"></span>

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
