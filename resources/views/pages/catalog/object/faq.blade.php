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

            <div class="ob_main_contact block block_850">
                @if($item->faq_title)
                    <h2 class="_h2" align="center">
                        {{ $item->faq_title  }}
                    </h2>
                @else
                    <h2 class="_h2" align="center">
                        {{ __('Вопрос-ответ') }}
                    </h2>
                @endif
                    <br>

                @if($item->faq)
                    @foreach($item->faq as $faq)

                        @if($faq['faq_t'])
                            <h3 class="faq_h3">{{ $faq['faq_t'] }}</h3>
                        @endif
                        <div class="faq_question desc desc_faq">{!! $faq['faq_question'] !!}</div>

                        <div class="faq_response desc desc_faq">{!! $faq['faq_response'] !!}</div>
                        <hr>
                    @endforeach
                @endif


            </div>
        </div>
    </main>

@endsection



