<x-dashboard-layout title="Редактирование сотрудника #{{ $employee->id }}">
    <x-dashboard-header-small pretitle="Данные" title="Сотрудник #{{ $employee->id }}">
        <a href="{{ route('employees.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="fullNameInput" class="form-label">ФИО</label>
                            <input type="text" name="name" class="form-control" id="fullNameInput" value="{{ old('name', $employee->name) }}" placeholder="Введите ФИО" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6  mb-3">
                            <label for="emailInput" class="form-label">Номер телефона</label>
                            <input type="email" name="email" class="form-control" id="emailInput" value="{{ old('email', $employee->email) }}" placeholder="example@gmail.com" required>
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="passwordInput" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Введите новый пароль">
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="password_confirmationInput" class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmationInput" placeholder="Подвердите пароля">
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
