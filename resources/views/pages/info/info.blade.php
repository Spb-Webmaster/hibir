@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($info->metatitle)) ? $info->metatitle : $info->title}}"
    description="{{($info->description)?:null}}"
    keywords="{{($info->keywords)?:null}}"
/>
@section('content')
    <main>

    </main>
@endsection






