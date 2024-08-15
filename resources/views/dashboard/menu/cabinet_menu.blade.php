<div class="hbox__submenu">
    <div class="view_subcategories_countries v_s_c ">
        <div class="flex v_s_c__flex">

            <div class="v_s_c__item "><a href="{{ route('cabinet.photos', ['id' => auth()->user()->id ]) }}">{{ __('Фото') }}</a></div>
            <div class="v_s_c__item"><a href="#">{{ __('Видео') }}</a></div>
            <div class="v_s_c__item"><a href="#">{{ __('Статьи') }}</a></div>
            <div class="v_s_c__item {{ active_linkMenu(asset(route('cabinet')))  }}"><a href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></div>

        </div>
        <div class="view_subcategories_countries__mobile menu_cab_m__js"></div>

    </div>
</div>
