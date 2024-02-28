@extends('layouts.dashboard')

@section('title')
    Users
@endsection

@section('content')
    @if (isset($users))
    <div class="div_item_admin_block">
        <div class="wrap_top_div_users_panel">
            <div id="users_search_block">
                <div class="input-group">
                    <input type="text" class="form-control" name="user_search" placeholder="Найти пользователя по имени..." autocomplete="off">
                </div>
                <div id="wrap_search_users_result"></div>
            </div>
        </div>
        <div id="wrap_filters_user_show">
            @if(isset($roles))
                <div id="wrap_roles_users_select">
                    <form action="{{ route('user_filters') }}" method="POST">
                        @csrf
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option>Выбрать роль пользователя...</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ session()->get('show_users_filters.role') == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
                            @endforeach
                        </select>
                        <select id="active_users_filters" class="form-select" name="active" aria-label="Default select example">
                            <option>Выбрать активный или не активный...</option>
                            <option value="1" {{ (null !== session()->get('show_users_filters')) && (null !== session()->get('show_users_filters.active')) && session()->get('show_users_filters.active') == 1 ? 'selected' : '' }}>Активный</option>
                            <option value="0" {{ (null !== session()->get('show_users_filters')) && (null !== session()->get('show_users_filters.active')) && session()->get('show_users_filters.active') == 0 ? 'selected' : '' }}>Не активный</option>
                        </select>
                        <select class="form-select" name="publish" aria-label="Default select example">
                            <option>Выбрать опубликован или не опубликован...</option>
                            <option value="1" {{ (null !== session()->get('show_users_filters')) && (null !== session()->get('show_users_filters.publish')) && session()->get('show_users_filters.publish') == 1 ? 'selected' : '' }}>Опубликован</option>
                            <option value="0" {{ (null !== session()->get('show_users_filters')) && (null !== session()->get('show_users_filters.publish')) && session()->get('show_users_filters.publish') == 0 ? 'selected' : '' }}>Не опубликован</option>
                        </select>
                        <div id="wrap_buttom_filters_user_show" class="header_button">
                            <button type="submit">Найти</button>
                            <a href="{{ route('refresh_users_filters') }}">
                                <div id="users_show_filters_refresh">
                                    <span class="material-icons">
                                        refresh
                                    </span>
                                </div>
                            </a>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        <div id="wrap_create_new_user">
            <div class="header_button">
                <a href="{{ route('create_user') }}" >
                    <button>Создать нового пользователя</button>
                </a>
            </div>
        </div>
        <div id="wrap_data_users">
            <table class="table table-primary table-hover">
                <thead id="thead_users">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Active</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->active }}</td>
                            <td>{{ $user->publish }}</td>
                            <td>
                                <a href="{{ route('edit_user', $user->id) }}">
                                    <button type="button" class="btn btn-primary g_my_stilizy">
                                        <span class="material-icons">edit</span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
<script src="{{ asset('js/paginator/paginator.js') }}"></script>
<script src="{{ asset('js/search/user_search.js') }}"></script>