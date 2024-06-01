<nav>


    <ul id="top_menu" class="top_menu">

     @foreach($menu as $m)
            <li class="{{ active_linkParse(asset( $m->slug )) }}"><a class="{{ active_linkParse(asset( $m->slug )) }} add__mobile_menu @if($loop->first) lodge @endif"
                    href="{{ asset( $m->slug ) }}"><span>  {{ $m->title }}</span></a></li>
     @endforeach

        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Информация')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Взаимодействие с государством')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Инфорбистро')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Политимка')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Блог')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Новости')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Пресечение деятальности')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Ознакомление с кротом')}}</span></a></li>
        <li class=""><a class="add__mobile_menu " href="#"><span>{{__('Контатная информация')}}</span></a></li>

    </ul>
</nav>

