<x-dashboard-layout title="Опросы">
    <x-dashboard-header-large pretitle="Обзор" title="Опросы">
        <a href="{{ route('quizzes.create') }}" class="btn btn-primary lift">Добавить</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["quiz-id", "quiz-fullname", "quiz-quizname", "quiz-email", "quiz-roles"]}' id="list">
            <div class="card-header">
                <div class="col">
                    <form>
                        <div class="input-group input-group-flush input-group-merge input-group-reverse">
                            <input class="form-control list-search" type="search" quizholder="Поиск ...">
                            <span class="input-group-text"><i class="fe fe-search"></i></span>
                        </div>
                    </form>
                </div>

                {{-- <x-filter model="quizs" /> --}}
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="quiz-id">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="quiz-fullname">Вопрос</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="quiz-quizname">Кол.во баллов за прохождение</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="quiz-quizname">Начало</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="quiz-quizname">Окончание</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="quiz-quizname">Статус</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($quizzes as $quiz)
                            <tr>
                                <td class="quiz-id">#{{ $quiz->id }}</td>

                                <td class="quiz-fullname">{{ $quiz->title }}</td>
                                <td class="quiz-fullname text-center">{{ $quiz->points_for_passing }}</td>
                                <td class="quiz-fullname">{{ $quiz->start }}</td>
                                <td class="quiz-fullname">{{ $quiz->ending }}</td>

                                <td class="quiz-fullname">
                                    @if ($quiz->deleted_at == null)
                                        <span class="item-score badge bg-success-soft">Активный</span>
                                    @else
                                        <span class="item-score badge bg-danger-soft">Неактивный</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Подробнее">
                                            <span class="fe fe-info"></span>
                                        </a>
                                        @if ($quiz->deleted_at == null)
                                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                                <span class="fe fe-edit-2"></span>
                                            </a>

                                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" id="item{{ $quiz->id }}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $quiz->id }})">
                                                    <span class="fe fe-trash text-danger"></span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('quizzes.restore', $quiz->id) }}" id="item{{ $quiz->id }}" method="POST">
                                                @csrf
                                                @method ('PUT')
                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $quiz->id }}, 'restore')">
                                                    <span class="fe fe-repeat text-danger"></span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Вы еще не добавили опросы</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $quizzes->withQueryString()->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
