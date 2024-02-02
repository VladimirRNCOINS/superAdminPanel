<div class="wrap_ul_left_menu">
    <ul class="ul_left_menu">
        <a class="a_left_menu" href="{{ route('admin') }}">
            <li class="{{ request()->routeIs('admin') ? 'active_left_menu' : 'li_left_menu' }}">
                <span>Administrator</span>
            </li>
        </a>
        <a class="a_left_menu" href="{{ route('users') }}">
            <li class="{{ request()->routeIs('users') ? 'active_left_menu' : 'li_left_menu' }}">
                <span>Пользователи</span>
            </li>
        </a>
        <a class="a_left_menu" href="{{ route('versions') }}">
            <li class="{{ request()->routeIs('versions') ? 'active_left_menu' : 'li_left_menu' }}">
                <span>Версия приложения</span>
            </li>
        </a>
    </ul>
</div>