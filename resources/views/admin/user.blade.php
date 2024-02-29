@extends('layouts.dashboard')

@section('title')
    User
@endsection

@section('content')
    <div class="div_item_admin_block">
        @if (!empty($errors) && $errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endisset
        @if( request()->routeIs('edit_user') )
            <div>
                <h5>Редактировать пользователя:</h5>
            </div>
        @elseif( request()->routeIs('create_user') )
            <div>
                <h5>Создать пользователя:</h5>
            </div>
        @endif
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
        <form action="{{ $post_action }}" method="POST">
            @csrf
            
            <div id="wrap_inputs_inside_block">
                <div class="mb-3">
                    <label class="local_item_marker item_label_user_form">Пользователь:</label>
                    @if( isset($user->name) )
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Имя пользователя" autocomplete="off">
                    @else
                        <input type="text" name="name" class="form-control" placeholder="Имя пользователя" autocomplete="off">
                    @endif
                </div>
                <div class="mb-3">
                    <label class="local_item_marker item_label_user_form">E-mail:</label>
                    @if( isset($user->email) ) 
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="E-mail" autocomplete="off">
                    @else
                        <input type="text" name="email" class="form-control" placeholder="E-mail" autocomplete="off">
                    @endif
                </div>
                @if( request()->routeIs('create_user') )
                    <div class="mb-3">
                        <label class="local_item_marker item_label_user_form">Пароль:</label>
                        <input type="text" name="password" class="form-control" placeholder="Пароль" autocomplete="off">
                    </div>
                @endif
            </div>
            
            @if( request()->routeIs('edit_user') )
                <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            @endif

            <div id="wrap_inside_user_update_block">
                <div id="wrap_manage_user_roles">
                    <div class="local_item_marker" style="margin: 0 0 10px 0;">Роли пользователя:</div>
                    @foreach($roles as $role)
                    <div class="item_user_role">
                        @if( isset($user_roles) )
                            <input type="checkbox" {{ in_array($role->id, $user_roles) ? 'checked' : '' }} name="check_roles[]" value="{{ $role->id }}">
                        @else
                            <input type="checkbox" name="check_roles[]" value="{{ $role->id }}">
                        @endif
                        {{ $role->role }}
                    </div>  
                    @endforeach
                </div>
                <div>
                    <div id="wrap_user_active">
                        <div class="local_item_marker" style="margin: 0 0 15px 0;">Активировать/Деактивировать пользователя</div>
                        <select class="form-select" name="active" aria-label="Default select example">
                            @if( isset($user->active) )
                                <option value="1" {{ ($user->active == 1) ? 'selected' : '' }}>Активный</option>
                                <option value="0" {{ ($user->active == 0) ? 'selected' : '' }}>Не активный</option>
                            @else
                                <option value="1">Активный</option>
                                <option value="0">Не активный</option>
                            @endif
                        </select>
                    </div>
                    <div id="wrap_user_publish">
                        <div class="local_item_marker" style="margin: 0 0 15px 0;">Публиковать/Не публиковать пользователя</div>
                        <select class="form-select" name="publish" aria-label="Default select example">
                            @if( isset($user->publish) )
                                <option value="1" {{ ($user->publish == 1) ? 'selected' : '' }}>Опубликован</option>
                                <option value="0" {{ ($user->publish == 0) ? 'selected' : '' }}>Не опубликован</option>
                            @else
                                <option value="1">Опубликован</option>
                                <option value="0">Не опубликован</option>
                            @endif
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
