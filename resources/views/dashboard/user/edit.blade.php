<x-dashboard-layout title="Редактирование Пользовательа #{{ $user->id }}">
    <x-dashboard-header-small pretitle="Данные" title="Пользователь #{{ $user->id }}">
        <a href="{{ route('users.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="fullNameInput" class="form-label">ФИО</label>
                            <input type="text" name="name" class="form-control" id="fullNameInput" value="{{ old('name', $user->name) }}" placeholder="Введите ФИО" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6  mb-3">
                            <label for="phoneInput" class="form-label">Номер телефона</label>
                            <input type="number" name="phone" class="form-control" id="phoneInput" value="{{ old('phone', $user->phone) }}" placeholder="Введите номер телефона" required>
                        </div>

                        <div class="col-12  mb-3">
                            <label for="avatarInput" class="form-label">Аватар</label>
                            <input type="file" name="avatar" class="form-control" id="avatarInput">
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
