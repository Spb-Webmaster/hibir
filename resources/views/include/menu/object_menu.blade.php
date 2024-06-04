
<div class="ob_menu_hor">
    <div class="ob_menu_hor__ul ">

        <ul class="top_menu">
            <li class="{{ active_linkMenu(asset(route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu" href="{{ route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Главная</span></a></li>

            <li class=""><a class="add__mobile_menu" href="#"><span>Новости</span></a></li>


            <li class="{{ active_linkMenu(asset(route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Фотогалерея</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Вопрос-ответ</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.video', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.video', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Видеоматериалы</span></a></li>


            <li class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Полезная информация</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="add__mobile_menu"  href="{{ route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Контакты</span></a></li>

        </ul>
    </div>

</div>
