
            <li class="class="{{ route('cabinet.photos', ['id' => auth()->user()->id ])  }}""><a href="{{ route('cabinet.photos', ['id' => auth()->user()->id ]) }}">{{ __('Фото') }}</a></li>
            <li><a href="#">{{ __('Видео') }}</a></li>
            <li><a href="#">{{ __('Статьи') }}</a></li>
            <li class="{{ active_linkMenu(asset(route('cabinet'))) }}"><a href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></li>

