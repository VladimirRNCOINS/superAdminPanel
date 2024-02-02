<div class="header_panel">
    <div class="wrap_main_menu">
        <a class="a_main_menu" href="{{ route('main') }}">
            <div class="item_main_menu">Главная</div>
        </a>
        @if(Auth::check() && Session::get('SuperAdmin') == '7')
            <a class="a_main_menu" href="{{ route('admin') }}">
                <div class="item_main_menu">Администратор</div>
            </a>
        @endif
    </div>

    @if(Auth::check())
        <div class="header_button">
            <a href="{{ route('logout') }}"><button>Выйти</button></a>
        </div>
    @else
        <div class="header_button">
            <a href="{{ route('entry') }}"><button>Войти</button></a>
        </div>
    @endif
</div>