@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <section class="good_summer"></section>
    <main>
        @include('include.blocks.sections.sections_index')
        @include('include.blocks.slider.top_slider')
        @include('include.blocks.slider.news_slider')
        @include('include.blocks.slider.video_slider')
        <div class="h_row block">
            <div class="h_col h_col__faq">
                @include('include.blocks.faq.teaser_faq')
            </div>
            <div class="h_col h_col__responce">
                @include('include.blocks.responce.teaser_responce')
            </div>
        </div><!--.h_row-->
        @include('include.blocks.content.content_index')
    </main>
@endsection