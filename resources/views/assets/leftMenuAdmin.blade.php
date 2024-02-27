<div class="wrap_ul_left_menu">
    <ul class="ul_left_menu">
        <li>
            <a class="a_left_menu" href="{{ route('admin') }}">
                <div class="{{ request()->routeIs('admin') ? 'active_left_menu' : 'li_left_menu' }}">
                    <span>Administrator</span>
                </div>
            </a>
        </li>
        <li>
            <a class="a_left_menu" href="{{ route('users') }}">
                <div class="{{ 
                                request()->routeIs('users_show') || request()->routeIs('edit_user') || request()->routeIs('create_user')
                                    ? 'active_left_menu' : 'li_left_menu' 
                            }}">
                    <span>Пользователи</span>
                </div>
            </a>
            <ul class="ul_sub_left_menu">
                @if(request()->routeIs('create_user'))
                    <li class="sub_left_menu">
                        <span class="material-icons">
                            arrow_right
                        </span>
                        Создать
                    </li>
                @endif
                @if(request()->routeIs('edit_user'))
                    <li class="sub_left_menu">
                        <span class="material-icons">
                            arrow_right
                        </span>
                        Редактировать
                    </li>
                @endif
            </ul>
        </li>
        <li>
            <a class="a_left_menu" href="{{ route('versions') }}">
                <div class="{{ request()->routeIs('versions') ? 'active_left_menu' : 'li_left_menu' }}">
                    <span>Версия приложения</span>
                </div>
            </a>
        </li>
    </ul>
</div>