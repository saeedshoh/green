<x-dashboard-layout title="Редактирование категории #{{ $category->id }}">
    <x-dashboard-header-small pretitle="Данные" title="Категория #{{ $category->id }}">
        <a href="{{ route('categories.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="titleInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="titleInput" value="{{ old('title', $category->title) }}" placeholder="Введите название категории" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6  mb-3">
                            <label for="iconInput" class="form-label">Иконка</label>
                            <input type="file" name="icon" class="form-control" id="iconInput" value="{{ old('icon') }}">
                        </div>
                    </div>

                    @if ($errors->any())
                        <ul class="list-group my-3">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <hr class="my-5">
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-lg btn-white">Очистить</button>
                        <button type="submit" class="btn btn-lg btn-primary">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
