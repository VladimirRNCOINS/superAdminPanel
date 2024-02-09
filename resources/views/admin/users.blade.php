@extends('layouts.dashboard')

@section('title')
    Users
@endsection

@section('content')
    @if (isset($users))
    <div class="div_item_admin_block">
        
            <div id="wrap_data_users">
                @foreach ($users as $user)
                    {{ $user->name }}
                @endforeach
                <div>-------------------------------------------</div>
                <div>Всего: {{ $users->total }}</div>
                <div>На странице: {{ $users->perPage }}</div>
                <div>Текущая страница: {{ $users->currentPage }}</div>
                <div>Последняя страница: {{ $users->lastPage }}</div>
            </div>
        
        <div id="wrap_custom_pagination_block">
            <div id="inside_wrap_custom_pagination_block">
                <div class="pagination_element" id="fast_rewind">
                    <span class="material-icons">
                        fast_rewind
                    </span>
                </div>
                <div class="pagination_element" id="arrow_left">
                    <span class="material-icons">
                        arrow_left
                    </span>
                </div>
                <div class="pagination_text">
                    <span>Страница:</span>
                </div>
                <div class="pagination_element" id="current_page">
                    <input type="text" name="current_page" class="form-control" value="{{ $users->currentPage }}" autocomplete="off">
                </div>
                <div class="pagination_text">
                    <span id="span_last_page">из {{ $users->lastPage }}</span>
                </div>
                <div class="pagination_element" id="arrow_right">
                    <span class="material-icons">
                        arrow_right
                    </span>
                </div>
                <div class="pagination_element" id="fast_forward">
                    <span class="material-icons">
                        fast_forward
                    </span>
                </div>
                <div class="pagination_element" id="refresh">
                    <span class="material-icons">
                        refresh
                    </span>
                </div>
                <div class="pagination_text">
                    <span>На странице:</span>
                </div>
                <div class="pagination_element" id="per_page">
                    <input type="text" name="per_page" class="form-control" value="{{ $users->perPage }}" autocomplete="off">
                </div>
            </div>
        </div>
        
    </div>
    @endif
@endsection