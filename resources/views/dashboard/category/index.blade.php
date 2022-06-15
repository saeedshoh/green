<x-dashboard-layout title="Категории">
    <x-dashboard-header-large pretitle="Обзор" title="Категории">
        <a href="{{ route('categories.create') }}" class="btn btn-primary lift">Добавить</a>
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

                <x-filter model="categories" />
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="category-id">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="category-fullname">Название</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Статус</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="category-id">#{{ $category->id }}</td>
                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">
                                        @if ($category->icon)
                                            <img class="avatar-img rounded-circle" src="{{ asset($category->icon) }}" alt="...">
                                        @else
                                            <span class="avatar-title rounded-circle">{{ mb_substr($category->title, 0, 1) }}</span>
                                        @endif
                                    </div> <a class="item-name text-reset">{{ $category->title }}</a>

                                </td>
                                <td class="user-fullname">
                                    @if ($category->deleted_at == null)
                                        <span class="item-score badge bg-success-soft">Активный</span>
                                    @else
                                        <span class="item-score badge bg-danger-soft">Неактивный</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        @if ($category->deleted_at == null)
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                                <span class="fe fe-edit-2"></span>
                                            </a>

                                            <form action="{{ route('categories.destroy', $category->id) }}" id="item{{ $category->id }}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $category->id }})">
                                                    <span class="fe fe-trash text-danger"></span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('categories.restore', $category->id) }}" id="item{{ $category->id }}" method="POST">
                                                @csrf
                                                @method ('PUT')
                                                <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $category->id }}, 'restore')">
                                                    <span class="fe fe-repeat text-danger"></span>
                                                </button>
                                            </form>
                                        @endif
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
        {{ $categories->withQueryString()->links() }}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-dashboard.sweet-alert></x-dashboard.sweet-alert>
</x-dashboard-layout>
