@extends('layouts.layout')
<x-seo.meta
    title="{{($item->title)?:null}}"
    description="{{($item->description)?:null}}"
    keywords="{{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')


           @include('include.menu.object_menu')

            <div class="ob_main_page block block_1123 page_l">
                <div class="page_l__left">
                    @if($item->main_title)
                        <h2 class="_h2">
                            {{ $item->main_title  }}
                        </h2>
                    @endif
                    <div class="desc desc_main__content">
                        {!! $item->main_desc !!}
                    </div>

                </div>
                <div class="page_l__right">


                    @if($item->main_right_img )
                        <div class="desc desc_main__imgR pad_t33">
                            <img class="pc_category_img" width="228" height="270" loading="lazy"
                                 src="{{ asset(intervention('228x270', $item->main_right_img, 'objects')) }}"
                                 alt="{{$item->main_right_img}}">
                        </div>
                        @if($item->main_right_img_text )
                            <div class="desc desc_main__signature_img">
                                {!! $item->main_right_img_text !!}
                            </div>
                        @endif
                    @endif




                </div>


            </div>

        </div>
    </main>
@endsection


