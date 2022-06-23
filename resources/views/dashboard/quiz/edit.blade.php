<x-dashboard-layout title="Добавление опроса">
    <x-dashboard-header-small pretitle="Новый" title="Опрос">
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title', $quiz->title) }}" placeholder="Введите название точки" maxlength="100" required autofocus>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="pointsForPassingInput" class="form-label">Количество баллов за прохождение</label>
                            <input type="number" name="points_for_passing" class="form-control" id="pointsForPassingInput" value="{{ old('points_for_passing', $quiz->points_for_passing) }}" placeholder="Введите баллов за прохождение"
                                maxlength="100" required autofocus>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="startInput" class="form-label">Начало</label>
                            <input type="datetime-local" name="start" class="form-control" id="startInput" value="{{ old('start', $quiz->start) }}" required>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="endingInput" class="form-label">Окончание</label>
                            <input type="datetime-local" name="ending" class="form-control" id="endingInput" value="{{ old('ending', $quiz->ending) }}" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Варианты</label>
                            <div class="row">
                                @forelse ($quiz->variants as $variant)
                                    <div class="col-12 my-2" style="display: inherit; padding-right: 0;">
                                        <input type="text" name="variants[{{$variant->id}}][]" class="form-control" id="fullNameInput" value="{{ $variant->title }}" placeholder="Введите вариант ответа" maxlength="100" required autofocus>
                                    </div>

                                @empty
                                @endforelse
                            </div>
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
                        <button type="submit" class="btn btn-lg btn-primary" id="submit">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
