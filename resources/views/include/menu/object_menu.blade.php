
<div class="ob_menu_hor">
    <div class="ob_menu_hor__ul ">

        <ul class="top_menu">
            <li class="{{ active_linkMenu(asset(route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu "
                                                                                                                                                    href="{{ route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Главная</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Фотогалерея</span></a></li>
            <li class="">
                <a class="  add__mobile_menu "
                   href="https://seatranslog.ru/services"><span>Вопрос-ответ </span></a>


                <ul class="submenu">
                    <li class=""><a class="add__mobile_menu "
                                    href="https://seatranslog.ru/services/gruzoperevozki"><span>Грузоперевозки</span></a>
                    </li>
                    <li class=""><a class="add__mobile_menu "
                                    href="https://seatranslog.ru/services/fraht"><span>Фрахт</span></a></li>
                    <li class=""><a class="add__mobile_menu "
                                    href="https://seatranslog.ru/services/ekspedirovanie"><span>Экспедирование</span></a>
                    </li>
                    <li class=""><a class="add__mobile_menu "
                                    href="https://seatranslog.ru/services/sklad"><span>Склад</span></a></li>
                    <li class=""><a class="add__mobile_menu "
                                    href="https://seatranslog.ru/services/strahovanie-gruzov"><span>Страхование грузов</span></a>
                    </li>
                </ul>
            </li>
            <li class=""><a class="add__mobile_menu" href="/contacts"><span>Видеоматериалы</span></a></li>
            <li class=""><a class="add__mobile_menu" href="/contacts"><span>Полезная информация</span></a>
            </li>
            <li class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Контакты</span></a></li>
        </ul>
    </div>

</div>
