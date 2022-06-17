<x-dashboard-layout title="Топ лидеров">
    <x-dashboard-header-large pretitle="Обзор" title="Топ лидеров"></x-dashboard-header-large>

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
                            <th><a href="#" class="text-muted list-sort" data-sort="user-fullname">ФИО</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-id">Место</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Балл</a></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($leaders as $leader)
                            <tr>
                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">
                                        @if ($leader->avatar)
                                            <img class="avatar-img rounded-circle" src="{{ asset($leader->avatar) }}" alt="...">
                                        @else
                                            <span class="avatar-title rounded-circle">{{ mb_substr($leader->full_name, 0, 1) }}</span>
                                        @endif
                                    </div> <a class="item-name text-reset">{{ $leader->full_name }}</a>

                                </td>
                                <td class="user-id">{{ $loop->iteration }}</td>
                                <td class="user-fullname">{{ $leader->ball }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Участники еще не получили баллы</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $leaders->onEachSide(5)->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
