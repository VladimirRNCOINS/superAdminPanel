@extends('layouts.dashboard')

@section('title')
    Versions
@endsection

@section('content')
    <div class="div_item_admin_block">
        @if(session()->has('version_success'))
            <div class="wrap_success_message">
                <a href="{{ route('versions') }}">
                    <div class="close_message">
                        <span>&times;</span>
                    </div>
                </a>
                <div class="success_message">
                    {{ session()->get('version_success') }}
                </div>
            </div>
        @endif
        @if(session()->has('version_error'))
            <div class="wrap_success_message">
                <a href="{{ route('versions') }}">
                    <div class="close_message">
                        <span>&times;</span>
                    </div>
                </a>
                <div class="error_message">
                    {{ session()->get('version_error') }}
                </div>
            </div>
        @endif
        <div><b>Создать хеш для отслеживания новой версии приложения:</b></div>
        <a href="{{ route('create_version') }}">
            <button class="simple_button">Создать</button>
        </a>
    </div>
@endsection