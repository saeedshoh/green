<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - {{ $title }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/theme.css') }}" rel="stylesheet">
</head>

<body>
    <x-dashboard.sidebar></x-dashboard.sidebar>

    <div class="main-content">
        {{ $slot }}
    </div>

    @isset($notify)
        <div class="toast" role="alert" style="position: fixed; top: 2rem; right: 2rem;">
            <div class="toast-header">
                <h4 class="mb-0 me-auto text-primary fw-bold">Уведомление</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $notify }}
            </div>
        </div>
    @endisset

    <script src="{{ asset('js/dashboard/app.js') }}"></script>
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    {{ $script ?? null }}
    @include('sweetalert::alert')
</body>

</html>
