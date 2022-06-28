<x-dashboard-layout title="Рекламы">
    <x-dashboard-header-large pretitle="Обзор" title="Рекламы">
        <a href="{{ route('advertisings.create') }}" class="btn btn-primary lift">Добавить</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["advertising-id", "advertising-fullname", "advertising-advertisingname", "advertising-email", "advertising-roles"]}' id="list">
            <div class="card-header">
                <div class="col">
                    <form>
                        <div class="input-group input-group-flush input-group-merge input-group-reverse">
                            <input class="form-control list-search" type="search" advertisingholder="Поиск ...">
                            <span class="input-group-text"><i class="fe fe-search"></i></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="advertising-id">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="advertising-fullname">Название</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="advertising-advertisingname">Дедлайн</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="advertising-advertisingname">Статус</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($advertisings as $advertising)
                            <tr>
                                <td class="advertising-id">#{{ $advertising->id }}</td>

                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">
                                        @if ($advertising->image)
                                            <img class="avatar-img rounded-circle" src="{{ asset($advertising->image) }}" alt="...">
                                        @else
                                            <span class="avatar-title rounded-circle">{{ mb_substr($advertising->title, 0, 1) }}</span>
                                        @endif
                                    </div> <a class="item-name text-reset">{{ $advertising->title }}</a>

                                </td>
                                <td class="advertising-fullname">{{ $advertising->deadline }}</td>

                                <td class="advertising-fullname">
                                    @if ($advertising->deleted_at == null)
                                        <span class="item-score badge bg-success-soft">Активный</span>
                                    @else
                                        <span class="item-score badge bg-danger-soft">Неактивный</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        @if ($advertising->deleted_at == null)
                                            <a href="{{ route('advertisings.show', $advertising->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Подробнее">
                                                <span class="fe fe-info"></span>
                                            </a>

                                            <a href="{{ route('advertisings.edit', $advertising->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                                <span class="fe fe-edit-2"></span>
                                            </a>

                                            <form action="{{ route('advertisings.destroy', $advertising->id) }}" id="item{{ $advertising->id }}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $advertising->id }})">
                                                    <span class="fe fe-trash text-danger"></span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('advertisings.restore', $advertising->id) }}" id="item{{ $advertising->id }}" method="POST">
                                                @csrf
                                                @method ('PUT')
                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $advertising->id }}, 'restore')">
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
        {{ $advertisings->withQueryString()->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
