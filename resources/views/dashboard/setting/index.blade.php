<x-dashboard-layout title="Настройки">
    <x-dashboard-header-large pretitle="Обзор" title="Настройки">
        {{-- <a href="{{ route('settings.create') }}" class="btn btn-primary lift">Добавить</a> --}}
    </x-dashboard-header-large>

    <div class="container-fluid">
        <form action="{{ route('settings.store') }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
            @csrf
            <div class="card" data-list='{"valueNames": ["user-id", "user-fullname", "user-username", "user-email", "user-roles"]}' id="list">
                <div class="table-responsive">
                    <table class="table table-hover tabl33e-nowrap card-table">
                        <thead>
                            <tr>
                                <th><a href="#" class="text-muted list-sort" data-sort="user-fullname">Название</a></th>
                                <th><a href="#" class="text-muted list-sort " style="float: right" data-sort="user-username">Значание</a></th>
                            </tr>
                        </thead>
                        <tbody class="list font-size-base">
                            @foreach ($settings as $setting)
                                <tr>
                                    <td class="user-fullname w-50">{{ $setting->name }}
                                        <p class="header-subtitle">
                                            {{ $setting->decription }}
                                        </p>
                                    </td>
                                    <td class="user-username w-25">
                                        <div class="input-group input-group-merge mb-3 w-50" style="float: right">
                                            <input class="form-control" name="{{ $setting->key }}" type="text" value="{{ $setting->value }}" required>
                                            <div class="input-group-text" id="inputGroup">
                                                {{ $setting->unit }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($errors->any())
                <ul class="list-group my-3">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary lift">Сохранить</button>
            </div>
        </form>
    </div>


    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
</x-dashboard-layout>
