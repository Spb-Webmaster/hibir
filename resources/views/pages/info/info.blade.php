@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($new->metatitle)) ? $new->metatitle : $new->title}}"
    description="{{($new->description)?:null}}"
    keywords="{{($new->keywords)?:null}}"
/>
@section('content')
    <main>

    </main>
@endsection






