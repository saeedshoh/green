<x-dashboard-layout title="Редактирование приза #{{ $gift->id }}">
    <x-dashboard-header-small pretitle="Данные" title="Приз #{{ $gift->id }}">
        <a href="{{ route('gifts.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('gifts.update', $gift->id) }}" enctype="multipart/form-data"  method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="fullNameInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title', $gift->title) }}" placeholder="Введите название приза" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6  mb-3">
                            <label for="imageInput" class="form-label">Изображение</label>
                            <input type="file" name="image" class="form-control" id="imageInput" value="{{ old('image') }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Описание</label>
                            <textarea name="description" rows="5" class="form-control" data-bs-toggle="autosize" rows="1" placeholder="Введите описание для приза">{{ old('description', $gift->title) }}</textarea>
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
