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


            </div>
        </div>
    </main>

@endsection



