<x-dashboard-layout title="Добавление опроса">
    <x-dashboard-header-small pretitle="Новый" title="Опрос">
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('quizzes.store') }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    <div class="row" x-data="alpine()">
                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" id="fullNameInput" value="{{ old('title') }}" placeholder="Введите название точки" maxlength="100" required autofocus>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="pointsForPassingInput" class="form-label">Количество баллов за прохождение</label>
                            <input type="number" name="points_for_passing" class="form-control" id="pointsForPassingInput" value="{{ old('points_for_passing') }}" placeholder="Введите баллов за прохождение" maxlength="100" required autofocus>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="startInput" class="form-label">Начало</label>
                            <input type="datetime-local" name="start" class="form-control" id="startInput" value="{{ old('start') }}" required>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="endingInput" class="form-label">Окончание</label>
                            <input type="datetime-local" name="ending" class="form-control" id="endingInput" value="{{ old('ending') }}" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="fullNameInput" class="form-label">Варианты</label>
                            <div class="row">
                                <template x-for="(field, index) in fields" :key="field.id">
                                    <div class="col-12 my-2" style="display: inherit; padding-right: 0;">
                                        <input type="text" name="variants[]" class="form-control" id="fullNameInput" placeholder="Введите название точки" maxlength="100" required autofocus>
                                        <button type="button" class="btn btn-danger mx-2" data-bs-toggle="tooltip" @click="removeField(field)" title="Удалить последный вариант"> <i class="fe fe-x-circle"></i> </button>
                                    </div>
                                </template>
                                <div class="col mt-3">
                                    <button type="button" class="btn btn-success" data-bs-toggle="tooltip" title="Добавить новый вариант" @click="addNewField()"> <i class="fe fe-plus-circle"></i> </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="my-5">
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-lg btn-white">Очистить</button>
                        <button type="submit"  class="btn btn-lg btn-primary" x-model="submit" id="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function alpine() {
            return {
                submit : false,
                fields: [{
                    id: 1,
                }, {
                    id: 2,
                }],
                addNewField() {
                    this.fields.push({
                        id: new Date().getTime() + this.fields.length
                    });
                },
                removeField(field) {
                    this.fields.splice(this.fields.indexOf(field), 1);
                }
            }
        }
    </script>
</x-dashboard-layout>
