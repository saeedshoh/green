<div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-end">
                <div class="col">
                    <h6 class="header-pretitle">{{ $pretitle }}</h6>
                    <h1 class="header-title">{{ $title }}</h1>
                </div>
                <div class="col-auto">{{ $create ?? null }}</div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                        {{ $nav }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
