<x-dashboard-layout title="История баллов">
    <x-dashboard-header-large pretitle="Обзор" title="История баллов">
         <a href="{{ route('leaders.show') }}" class="btn btn-primary lift">Топ лидеров</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["user-id", "user-fullname", "user-username", "user-email", "user-roles"]}' id="list">
            <div class="card-header">
                <form>
                    <div class="input-group input-group-flush input-group-merge input-group-reverse">
                        <input class="form-control list-search" type="search" placeholder="Поиск ...">
                        <span class="input-group-text"><i class="fe fe-search"></i></span>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-id">Балл</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-fullname">Откуда</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Дата получение балла</a></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($balls as $ball)
                            <tr>
                                <td class="user-id" style="width: 15px;"> +{{ $ball->ball }}</td>
                                <td class="user-id" style="width: 15px;">
                                    @if ($ball->type == 'place')
                                        <span class="text-muted">U-Places: </span> <a href="{{ route('places.show', $ball->model_id) }}" class="item-name text-reset">{{ getPlaceName($ball->model_id) }}</a>
                                    @endif

                                    @if ($ball->type == 'connect')
                                        <span class="text-muted">U-Connect: </span> <a href="{{ route('users.show', $ball->model_id) }}" class="item-name text-reset">{{ getUserName($ball->model_id) }}</a>
                                    @endif

                                    @if ($ball->type == 'quiz')
                                        <span class="text-muted">Quiz: </span> <a href="{{ route('quizzes.show', $ball->model_id) }}" class="item-name text-reset">{{ getQuizName($ball->model_id) }}</a>
                                    @endif
                                </td>
                                <td class="user-id" style="width: 15px;">{{ $ball->created_at }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Участник еще не получил баллы (история не сохраненно)</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $balls->onEachSide(5)->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
