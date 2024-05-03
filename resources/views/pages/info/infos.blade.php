@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <main>
        <div class="block category_teaser">
        @foreach($news as $new)
                <div class=" slick_slide">
                    <div class="slide_link slick_slider__1">
                        <div class="s_img">
                            <a href="{{asset(route('info', $new->slug))}}">
                                <img class="pc_category_img" width="380" height="220" loading="lazy"
                                     src="{{ asset(intervention('380x220', $new->img, 'infos')) }}"
                                     alt="{{$new->title}}">
                            </a>
                        </div>
                        <div class="s_title">
                            <a href="{{asset(route('info', $new->slug))}}"><span>{{ $new->title }}</span></a>
                        </div>
                        <div class="s_date">
                            <span>{{ rusdate3($new->created_at) }}</span>
                        </div>

                    </div>
                </div>


        @endforeach
        </div>
        <div class="block">
        {{ $news->withQueryString()->links('pagination::default') }}
        </div>
    </main>
@endsection





