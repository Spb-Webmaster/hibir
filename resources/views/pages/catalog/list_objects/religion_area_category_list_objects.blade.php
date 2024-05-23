@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="r_filter z-index_100">
            <div class="r_filter__b"></div>
            <div class="block block_1147">
                <div class="r_filter__flex">
                    <div class="r_filter__left">
                        @include('include.blocks.religions.religion_select')
                    </div>
                    <div class="r_filter__right">
                        @include('include.blocks.region.region_select')

                    </div>
                </div>
            </div>
        </div>

        <div class="r_filter z-index_90">
            <div class="block block_1147">
                <div class="r_filter__flex r_filter__flex_nopadding">
                    <div class="r_filter__left">
                        <div class="axeld_select__js religion_select__flex ">
                            <div class="_h1 color_green"><span>{{__('Вид объекта:')}}</span></div>
                            <div class="font_30 s_active pad_l10">{{ $selected_religion_category->title }}</div>

                        </div>
                    </div>
                    <div class="r_filter__right">
                    </div>
                </div>
            </div>
        </div>

   @include('include.blocks.search.big_search')

   @include('include.blocks.content.teaser.teaser_4')



    </main>
@endsection



