@extends('layouts.main')

@section('title')
    Entry
@endsection

@section('content')
    <div class="wrap_entry_form">
        <form action="{{ route('login') }}" method="post" class="entry_form">
            @csrf
            <label for="email">Почта:</label>
            <input name="email" type="text" class="entry_input"/>
            <label for="email">Пароль:</label>
            <input name="password" type="password" class="entry_input"/>
            <div class="wrap_submit">
                <input class="entry_submit" type="submit" value="Войти" />
            </div>
        </form>
    </div>
@endsection