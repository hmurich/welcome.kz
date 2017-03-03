<ul class="nav navbar-nav navbar-right">
    <!-- <li class="disabled"><a href="#">Link</a></li> -->
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Профайл <b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu">
            <li><a href="{{ action('AdminSiteSettingController@getIndex') }}">Настройки</a></li>
            <li><a href="{{ action('AdminController@getProfile') }}">Профайл</a></li>
            <li class="divider"></li>
            <li class="disabled">
                <a href="{{ action('AdminController@getLogout') }}">Выход</a>
            </li>
        </ul>
    </li>
</ul>
