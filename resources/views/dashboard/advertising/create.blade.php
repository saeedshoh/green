<x-dashboard-layout title="Добавление рекламы">
    <x-dashboard-header-small pretitle="Новая" title="Реклама">
        <a href="{{ route('advertisings.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('advertisings.store') }}" method="POST" method="POST" enctype="multipart/form-data" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    <div class="row" x-data="alpine()">
                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title') }}" placeholder="Введите название рекламы" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6  mb-3">
                            <label for="imageInput" class="form-label">Изображения</label>
                            <input type="file" name="image" class="form-control" id="imageInput" value="{{ old('image') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="deadlineInput" class="form-label">Дедлайн</label>
                            <input type="datetime-local" name="deadline" class="form-control" id="deadlineInput" value="{{ old('deadline') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="descriptionInput" class="form-label">Название</label>
                            <textarea class="form-control" name="description" id="descriptionInput" data-autosize rows="2" placeholder="Введите описание рекламы...">{{ old('description') }}</textarea>
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
                        <button type="submit" class="btn btn-lg btn-primary" x-model="submit" id="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
