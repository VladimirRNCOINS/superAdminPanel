@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message')
    <a href="{{ route('main') }}"><div id="link_to_main_page">Такая страница не найдена!
        <br>
    Перейти на главную страницу</div></a>
@endsection
