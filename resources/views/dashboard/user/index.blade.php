<x-dashboard-layout title="Пользователи">
    <x-dashboard-header-large pretitle="Обзор" title="Пользователи">
        <a href="{{ route('users.create') }}" class="btn btn-primary lift">Добавить</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["user-id", "user-fullname", "user-username", "user-email", "user-roles"]}' id="list">
            <div class="card-header">
                <div class="col">
                    <form>
                        <div class="input-group input-group-flush input-group-merge input-group-reverse">
                            <input class="form-control list-search" type="search" placeholder="Поиск ...">
                            <span class="input-group-text"><i class="fe fe-search"></i></span>
                        </div>
                    </form>
                </div>

                <x-filter model="users" search="name"/>

            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-id">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-fullname">ФИО</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Номер телефона</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Балл</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Статус</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Время создания</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($users as $user)
                            <tr>
                                <td class="user-id">#{{ $user->id }}</td>
                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">
                                        @if ($user->avatar)
                                            <img class="avatar-img rounded-circle" src="{{ asset($user->avatar) }}" alt="...">
                                        @else
                                            <span class="avatar-title rounded-circle">{{ mb_substr($user->name, 0, 1) }}</span>
                                        @endif
                                    </div> <a class="item-name text-reset">{{ $user->name }}</a>

                                </td>
                                <td class="user-fullname">{{ $user->phone }}</td>
                                <td class="user-fullname">{{ $user->ball }}</td>
                                <td class="user-fullname">
                                    @if ($user->deleted_at == null)
                                        <span class="item-score badge bg-success-soft">Активный</span>
                                    @else
                                        <span class="item-score badge bg-danger-soft">Неактивный</span>
                                    @endif
                                </td>
                                <td class="user-username">{{ $user->created_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        @if ($user->deleted_at == null)
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                                <span class="fe fe-edit-2"></span>
                                            </a>

                                            <form action="{{ route('users.destroy', $user->id) }}" id="item{{ $user->id }}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $user->id }})">
                                                    <span class="fe fe-trash text-danger"></span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('users.restore', $user->id) }}" id="item{{ $user->id }}" method="POST">
                                                @csrf
                                                @method ('PUT')
                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $user->id }}, 'restore')">
                                                    <span class="fe fe-repeat text-danger"></span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Вы еще не добавили пользователей</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->withQueryString()->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
