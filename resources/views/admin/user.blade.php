@extends('layouts.dashboard')

@section('title')
    User
@endsection

@section('content')
    <div class="div_item_admin_block">
        <div class="local_item_marker" id="user_update_name">
            Пользователь: {{ $user->name }}
        </div>
        <br />
        @if(session()->has('user_update_success'))
            <div class="wrap_success_message">
                <a href="{{ route('edit_user', ['id' => $user->id]) }}">
                    <div class="close_message">
                        <span>&times;</span>
                    </div>
                </a>
                <div class="success_message">
                    {{ session()->get('user_update_success') }}
                </div>
            </div>
        @endif
        <form action="/user_update" method="POST">
            @csrf
            <div class="input-group input-group-sm mb-3">
                <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div id="wrap_inside_user_update_block">
                <div id="wrap_manage_user_roles">
                    <div class="local_item_marker" style="margin: 0 0 10px 0;">Роли пользователя:</div>
                    @foreach($roles as $role)
                    <div class="item_user_role">
                        <input type="checkbox" {{ in_array($role->id, $user_roles) ? 'checked' : '' }} name="check_roles[]" value="{{ $role->id }}">
                        {{ $role->role }}
                    </div>  
                    @endforeach
                </div>
                <div>
                    <div id="wrap_user_active">
                        <div class="local_item_marker" style="margin: 0 0 15px 0;">Активировать/Деактивировать пользователя</div>
                        <select class="form-select" name="active" aria-label="Default select example">
                            <option value="1" {{ ($user->active == 1) ? 'selected' : '' }}>Активный</option>
                            <option value="0" {{ ($user->active == 0) ? 'selected' : '' }}>Не активный</option>
                        </select>
                    </div>
                    <div id="wrap_user_publish">
                        <div class="local_item_marker" style="margin: 0 0 15px 0;">Публиковать/Не публиковать пользователя</div>
                        <select class="form-select" name="publish" aria-label="Default select example">
                            <option value="1" {{ ($user->publish == 1) ? 'selected' : '' }}>Опубликован</option>
                            <option value="0" {{ ($user->publish == 0) ? 'selected' : '' }}>Не опубликован</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="wrap_buttom_filters_user_show" class="header_button">
                <button type="submit">Отправить</button>
            </div>
        </form>
    </div>
@endsection
