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
                        @include('include.blocks.religions.religioncategory_select')
                    </div>
                    <div class="r_filter__right">
                    </div>
                </div>
            </div>
        </div>


        @dump($items->all())



    </main>
@endsection



