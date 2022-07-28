<x-dashboard-layout title="Уведомления">
    <x-dashboard-header-large pretitle="Обзор" title="Уведомления">
        <a href="{{ route('notifications.create') }}" class="btn btn-primary lift">Добавить</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["category-id", "category-fullname", "category-categoryname", "category-email", "category-roles"]}' id="list">
            <div class="card-header">
                <div class="col">
                    <form>
                        <div class="input-group input-group-flush input-group-merge input-group-reverse">
                            <input class="form-control list-search" type="search" placeholder="Поиск ...">
                            <span class="input-group-text"><i class="fe fe-search"></i></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="category-fullname">Получитель</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Загаловка</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Сообщение</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Время отправки</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($notifications as $notification)
                            <tr>
                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">

                                        <img class="avatar-img rounded-circle" src="{{ asset($notification->data->avatar) }}" alt="...">

                                    </div> <a class="item-name text-reset">{{ $notification->data->user }}</a>

                                </td>
                                <td>{{ $notification->data->title }}</td>
                                <td>{{ $notification->data->message }}</td>
                                <td>{{ $notification->created_at }}</td>

                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                            <span class="fe fe-info"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Вы еще не добавили категории</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $notifications->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
