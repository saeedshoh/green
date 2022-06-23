<x-auth-layout title="Авторизация">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5 align-self-center">
                <div class="row justify-content-center">
                    <div class="col-3" style="width: 25%">
                        <div class="card p-2" style="border-radius: 27px; border: none; box-shadow: 0px 0rem 1rem 5px rgb(0 0 0 / 5%)">
                            <div class="card-body" style="padding:14px">
                                <div class="avatar avatar-lg">
                                    <img src="/images/default.png" alt="..." class="avatar-img rounded-circle">
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="display-4 text-center mb-3">Авторизация</h1>
                @if (session('message'))
                    <h5>{{ session('message') }}</h5>
                @endif

                <p class="text-muted text-center">Доступ к панели управления.</p>

                <form action="{{ route('admin.login') }}" method="POST" class="needs-validation mb-4" accept-charset="UTF-8" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="emailInput">Email</label>
                        <input type="email" name="email" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" id="emailInput" placeholder="name@address.com" required value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="passwordInput">Пароль</label>
                        <div class="input-group input-group-merge">
                            <input type="password" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" id="passwordInput" name="password" placeholder="Введите пароль" maxlength="25" required>
                            <span class="input-group-text"><i class="fe fe-eye"></i></span>
                        </div>
                    </div>

                    @if ($errors->any())
                        <ul class="list-group my-3">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <button class="btn btn-lg w-100 btn-primary mb-3">Войти</button>
                </form>

            </div>
            <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

                <!-- Image -->
                <div class="bg-cover h-100 min-vh-100 mt-n1 me-n3" style="background-image: url(images/auth-image.jpeg);"></div>

            </div>
        </div> <!-- / .row -->
    </div>
</x-auth-layout>
