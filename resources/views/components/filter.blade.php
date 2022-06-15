<div class="col-auto">
    <div class="dropdown">
        <button class="btn btn-sm btn-white" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="true">
            <i class="fe fe-sliders me-1"></i> Фильтр <span class="badge bg-primary ms-1 @if (!count(request()->except('page'))) d-none @endif">{{ count(request()->except('page')) }}</span>
        </button>
        @if (count(request()->except('page')))
            <a href="{{ route($model . '.index') }}" class="btn btn-sm btn-warning ms-2">Сбросить</a>
        @endif

        <form action="{{ route($model . '.index') }}" method="GET" class="dropdown-menu dropdown-menu-card" id="js-filter" accept-charset="utf-8" data-popper-placement="bottom-end">
            <div class="card-body">
                <div class="list-group list-group-flush mt-n4 mb-4">
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col">
                                <label for="dateStartInput">Статус</label>
                            </div>
                            <div class="col-auto">

                                <select name="status" class="form-select form-select-sm form-control" name="item-title">
                                    <option disabled selected>Выберите статуса</option>
                                    <option value="1">Активный</option>
                                    <option value="0">Неактивный</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                @if ($categories)
                    <div class="list-group list-group-flush mt-n4 mb-4">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="dateStartInput">Категория</label>
                                </div>
                                <div class="col-auto">
                                    <select name="category_id" class="form-select form-select-sm form-control" name="item-title">
                                        <option disabled selected>Выберите статуса</option>
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty

                                        @endforelse
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($search == 'full_name')
                    <div class="list-group list-group-flush mt-n4 mb-4">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="dateStartInput">Поиск по имени</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="full_name" class="form-control form-select-sm"  placeholder="Введите ФИО">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <button class="btn btn-sm w-100 btn-primary" type="submit">Применить</button>
            </div>
        </form>
    </div>
</div>
