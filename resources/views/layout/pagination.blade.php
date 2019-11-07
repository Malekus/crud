@if($model->total() != 0 && $model->total() != $model->count())
    <div class="row">
        <div class="col">
            <div class="pagination justify-content-center">
                @if($model->lastPage() <= 5)
                    @for($i = 1; $i < $model->lastPage() + 1; $i++)
                        @if($model->currentPage() == $i)
                            <li class="page-item active"><a class="page-link" href="{{ $model->url($i) }}">{{ $i  }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $model->url($i) }}">{{ $i  }}</a></li>
                        @endif
                    @endfor
                @elseif($model->currentPage() <= 3)
                    @for($i = 1; $i < 5; $i++)
                        @if($model->currentPage() == $i)
                            <li class="page-item active"><a class="page-link" href="{{ $model->url($i) }}">{{ $i  }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $model->url($i) }}">{{ $i  }}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $model->nextPageUrl() }}">Suivant</a></li>
                @elseif($model->lastPage() - 3 <= $model->currentPage())
                    <li class="page-item"><a class="page-link" href="{{ $model->previousPageUrl() }}">Précédent</a></li>
                    @for($i = 4; $i >= 0; $i--)
                        @if($model->currentPage() == $model->lastPage() - $i)
                            <li class="page-item active"><a class="page-link" href="{{ $model->url($model->lastPage() - $i) }}">{{ $model->lastPage() - $i  }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $model->url($model->lastPage() - $i) }}">{{ $model->lastPage() - $i  }}</a></li>
                        @endif
                    @endfor

                @else
                    <li class="page-item"><a class="page-link" href="{{ $model->previousPageUrl() }}">Précédent</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $model->url($model->currentPage() - 2) }}">{{ $model->currentPage() - 2 }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $model->url($model->currentPage() - 1) }}">{{ $model->currentPage() - 1 }}</a></li>
                    <li class="page-item active"><a class="page-link" href="{{ $model->url($model->currentPage()) }}">{{ $model->currentPage() }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $model->url($model->currentPage() + 1) }}">{{ $model->currentPage() + 1 }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $model->url($model->currentPage() + 2) }}">{{ $model->currentPage() + 2 }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $model->nextPageUrl() }}">Suivant</a></li>
                @endif
            </div>
        </div>
    </div>
@endif