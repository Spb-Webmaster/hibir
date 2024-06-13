@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <main>
        <div class="block category_teaser">
        @foreach($videos as $video)
                <div class=" slick_slide">
                    <div class="slide_link slick_slider__1">
                        <div class="s_img">
                            <a href="{{asset(route('video', $video->slug))}}">
                                <div class="white_circle responce_item__circle">
                                    <span class="white_circle__redplay"></span>
                                </div>
                                <img class="pc_category_img" width="380" height="220" loading="lazy"
                                     src="{{ asset(intervention('380x220', $video->img, 'videos')) }}"
                                     alt="{{$video->title}}">
                            </a>
                        </div>
                        <div class="s_title">
                            <a href="{{asset(route('info', $video->slug))}}"><span>{{ $video->title }}</span></a>
                        </div>
                        <div class="s_date">
                            <span>{{ rusdate3($video->created_at) }}</span>
                        </div>

                    </div>
                </div>


        @endforeach
        </div>
        <div class="block">
        {{ $videos->withQueryString()->links('pagination::default') }}
        </div>
    </main>
@endsection





