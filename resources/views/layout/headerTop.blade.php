<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body sizeCard">
                <div class="row">
                    <div class="col-12 pb-2">
                        @if(isset($iconHeader))
                            @include('layout.title', ['title' => $titleHeader , 'icon' => $iconHeader])
                        @else
                            <h1>{{ $titleHeader }}</h1>
                        @endif
                    </div>