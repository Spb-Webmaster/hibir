@props([
   'title' => '',
   'subtitle' => '',
   'action' => '',
   'method' => 'post',
   'buttons' => '',
])
    <div class="blockForm">
        <h1 class="blockForm__h1 text_center">{{ $title }}</h1>
        @if($subtitle)
            <p class="blockForm__pSubTitle text_center   color_grey color_grey_22">{{ $subtitle }}</p>
        @endif
        <form class="form"
              action="{{ $action }}"
              method="{{ $method }}"

        >
            @csrf
            {{ $slot  }}
            {{ $buttons  }}
        </form>
    </div><!--.blockForm-->
