<nav>
    <ul id="top_menu" class="top_menu">
     @foreach($menu as $m)
            <li class="{{ active_linkParse(asset( $m->slug ), 'find') }}"><a class="{{ active_linkParse(asset( $m->slug ), 'find') }} add__mobile_menu @if($loop->first) lodge @endif"
                    href="{{ asset( $m->slug ) }}"><span>  {{ $m->title }}</span></a>
            </li>
     @endforeach
    </ul>
</nav>

