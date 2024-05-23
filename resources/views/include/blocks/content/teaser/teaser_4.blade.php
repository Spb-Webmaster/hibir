<div class="block">
<div class="teaser_4">
  @foreach($items as $item)

        <div class="teaser_4__item t_item_4">

            <div class="t_item_4__img">
                <a href="#"><img width="277" height="209" loading="lazy"
                     src="{{ asset(intervention('277x209', $item->img, 'objects')) }}"
                                alt="{{$item->title}}"></a>
            </div>
            <div class="t_item_4__title">
                <a href="#">{{ $item->title }}</a>
            </div>

        </div>

    @endforeach



</div>
    {{ $items->withQueryString()->links('pagination::default') }}


</div>
