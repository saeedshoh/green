<x-dashboard-layout title="Точки">
    <x-dashboard-header-large pretitle="Обзор" title="Точки">
        <a href="{{ route('places.create') }}" class="btn btn-primary lift">Добавить</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["place-id", "place-fullname", "place-placename", "place-email", "place-roles"]}' id="list">
            <div class="card-header">
                <div class="col">
                    <form>
                        <div class="input-group input-group-flush input-group-merge input-group-reverse">
                            <input class="form-control list-search" type="search" placeholder="Поиск ...">
                            <span class="input-group-text"><i class="fe fe-search"></i></span>
                        </div>
                    </form>
                </div>

                <x-filter model="places" />
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-id">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-fullname">Название</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-placename">Адрес</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-placename">Режим работы</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-placename">Тел</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-placename">Кол.во баллов за посещение</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="place-placename">Статус</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($places as $place)
                            <tr>
                                <td class="place-id">#{{ $place->id }}</td>
                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">
                                        @if ($place->image)
                                            <img class="avatar-img rounded-circle" src="{{ asset($place->image) }}" alt="...">
                                        @else
                                            <span class="avatar-title rounded-circle">{{ mb_substr($place->title, 0, 1) }}</span>
                                        @endif
                                    </div> <a class="item-name text-reset">{{ $place->title }}</a>

                                </td>

                                <td class="place-fullname">{{ $place->address }}</td>
                                <td class="place-fullname">{{ $place->working_hours }}</td>
                                <td class="place-fullname">{{ $place->phone }}</td>
                                <td class="place-fullname">{{ $place->points_per_visit }}</td>
                                <td class="place-fullname">
                                    @if ($place->deleted_at == null)
                                        <span class="item-score badge bg-success-soft">Активный</span>
                                    @else
                                        <span class="item-score badge bg-danger-soft">Неактивный</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('places.show', $place->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Подробнее">
                                            <span class="fe fe-info"></span>
                                        </a>
                                        @if ($place->deleted_at == null)
                                            <a href="{{ route('places.edit', $place->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                                <span class="fe fe-edit-2"></span>
                                            </a>

                                            <a href="{{ route('places.qrcode', $place->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Скачать QR-кода">
                                                <span class="fe fe-download"></span>
                                            </a>

                                            <form action="{{ route('places.destroy', $place->id) }}" id="item{{ $place->id }}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $place->id }})">
                                                    <span class="fe fe-trash text-danger"></span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('places.restore', $place->id) }}" id="item{{ $place->id }}" method="POST">
                                                @csrf
                                                @method ('PUT')
                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $place->id }}, 'restore')">
                                                    <span class="fe fe-repeat text-danger"></span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Вы еще не добавили точки</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $places->withQueryString()->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
