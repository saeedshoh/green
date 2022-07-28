<x-dashboard-layout title="Добавить новое уведомление">
    <x-dashboard-header-small pretitle="Новое" title="Уведомление">
        <a href="{{ route('notifications.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('notifications.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="fullNameInput" class="form-label">Загаловка</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title') }}" placeholder="Введите заголовок уведомления" maxlength="100" required autofocus>
                        </div>

                        <div class="col-6  mb-3">
                            <label for="imageInput" class="form-label">Изображения</label>
                            <input type="file" name="image" class="form-control" id="imageInput" value="{{ old('image') }}" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="messageInput" class="form-label">Сообщение</label>
                            <textarea name="message" class="form-control" id="messageInput" rows="4" required> {{ old('message') }}</textarea>
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
                        <button type="submit" class="btn btn-lg btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-dashboard-layout>
