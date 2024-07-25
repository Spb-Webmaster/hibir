<div class="ob_menu_hor">
    <div class="ob_gamburger">
        <div class="gamburger menu-trigger">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="ob_gamburger__menu"><span>{{ __('Menu') }}</span></div>
    </div>


    <div class="ob_menu_hor__ul">

        <ul class="top_menu">
            <li class="{{ active_linkMenu(asset(route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}">
                <a class="{{ active_linkMenu(asset(route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level"
                   href="{{ route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Главная</span></a>
            </li>

            <li class="{{ active_linkMenu(asset(route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level"
                   href="{{ route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>О нас</span></a>
            </li>

            <li class="{{ active_linkMenu(asset(route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }}">
                <a class="{{ active_linkMenu(asset(route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }} add__mobile_menu upper_level"
                   href="{{ route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Новости</span></a>
            </li>


            <li><a class="@if(count($item->regobject_media)) arrow_down @endif" href="#"><span>Медиа</span></a>
                @if(count($item->regobject_media))

                    <ul class="submenu">
                        @foreach($item->regobject_media as $regobject_media)
                            <li class="{{ active_linkMenu(asset(route('page.object.media', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_media->slug ]))) }}">
                                <a class="{{ active_linkMenu(asset(route('page.object.media', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_media->slug ]))) }} add__mobile_menu"
                                   href="{{ route('page.object.media', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_media->slug ]) }}">{{ $regobject_media->title  }}</a>
                            </li>
                        @endforeach

                    </ul>
                @endif
            </li>

            <li class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level"
                   href="{{ route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Вопрос-ответ</span></a>
            </li>


            <li class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find'  ) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level  @if(count($item->regobject_info)) arrow_down @endif"
                   href="{{ asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ) }}"><span>{{ __('Полезная информация') }}</span></a>

                @if(count($item->regobject_info))

                    <ul class="submenu">
                        @foreach($item->regobject_info as $regobject_info)
                            <li class="{{ active_linkMenu(asset(route('page.object.info.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_info->slug ]))) }}">
                                <a class="{{ active_linkMenu(asset(route('page.object.info.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_info->slug ]))) }} add__mobile_menu"
                                   href="{{ route('page.object.info.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_info->slug ]) }}">{{ $regobject_info->title  }}</a>
                            </li>
                        @endforeach

                    </ul>
                @endif
            </li>

            <li class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level"
                   href="{{ route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Контактная информация</span></a>
            </li>

        </ul>
    </div>

</div>
<div class="ob_menu_hor__js ob_menu_hor__css"></div>

