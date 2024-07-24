@extends('layouts.layout')
<x-seo.meta
    title="{{($page->title)?:null}}"
    description="{{($page->description)?:null}}"
    keywords="{{($page->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')

            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_new block block_1123">

                @if($page->title)
                    <h2 class="_h2" align="center">
                        {{ $page->title  }}
                    </h2>

                @endif



                @if($page->text)
                    <div class="block  pad_t26_important  @if($page->a_img) page_l @endif">
                        <div class="@if($page->a_img) page_l__left @endif">
                            <div class="page_page__desc1 desc">
                                {!! $page->a_desc !!}
                            </div>
                        </div>
                        @if($page->a_img)
                            <div class="page_l__right">

                                @if($page->a_img)
                                    <div class="desc desc_main__imgR pad_t33 pad_b33">
                                        <img class="pc_category_img" width="228" height="270" loading="lazy"
                                             src="{{ asset(intervention('228x270', $page->a_img, 'objects')) }}"
                                             alt="{{$page->title}}">

                                    </div>

                                @endif
                            </div>
                        @endif

                    </div>

                @endif

                @if($page->a_desc2)
                    <div class="block page_l2 pad_t20">
                        <div class="page_page__desc2 desc">
                            {!! $page->a_desc2 !!}
                        </div>
                    </div>
                @endif

                @if($page->a_img2)
                    <div class="block pad_t26  pad_b20 ">
                        <a href="{{ asset(Storage::disk('public')->url($page->a_img2)) }}" data-fancybox=""><img
                                class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                src="{{ asset(Storage::disk('public')->url($page->a_img2)) }}"
                                alt="{{$page->title}}"></a>
                    </div>
                @endif

                @if($page->a_desc3)
                    <div class="block    @if($page->a_img3) page_r @endif">
                        @if($page->a_img3)
                            <div class="page_r__left">

                                @if($page->a_img3)
                                    <a href="{{ asset(Storage::disk('public')->url($page->a_img3)) }}"
                                       data-fancybox=""><img class="pc_category_img" width="500" height="376" loading="lazy"
                                                             src="{{ asset(intervention('500x376', $page->a_img3, 'objects')) }}"
                                                             alt="{{$page->title}}"></a>

                                @endif
                            </div>
                        @endif

                        <div class="@if($page->a_img3) page_r__right @endif">
                            <div class="page_page__desc1 desc pad_b33">
                                {!! $page->a_desc3 !!}
                            </div>
                        </div>

                    </div>
                @endif


                @if($page->a_desc4)
                    <hr class="p_hr">
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $page->a_desc4 !!}
                        </div>
                    </div>
                @endif

                @if($page->a_img4)
                    <div class="block pad_t26  pad_b20 ">
                        <a href="{{ asset(Storage::disk('public')->url($page->a_img4)) }}" data-fancybox=""><img
                                class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                src="{{ asset(Storage::disk('public')->url($page->a_img4)) }}"
                                alt="{{$page->title}}"></a>
                    </div>
                @endif




            @if(isset($page->video))
                <div class="ob_video">
                    @if($page->video)
                        @foreach($page->video as $v)

                            <div class="ob_controls">
                                @if($v['video_video_title'])
                                    <div class="desc ">
                                        <h4 class="pad_b26_important">{{$v['video_video_title']}}</h4>
                                    </div>
                                @endif
                                @if($v['video_video_video'])

                                    <video controls width="840" height="473"
                                           @if($page->above) poster="{{ asset(intervention('840x473', $page->img, 'videos')) }}" @endif>
                                        <source src="{{ asset('/storage/' .$v['video_video_video'])  }}"
                                                type="video/mp4">
                                    </video>
                                @endif

                                @if($v['video_video_youtube'])
                                    {!!   youtube($v['video_video_youtube'], 840,473) !!}
                                @endif


                                <div class="video_video_desc desc">
                                    @if($v['video_video_desc'])
                                        {!! $v['video_video_desc'] !!}
                                    @endif
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>

            @endif

                    @if(isset($page->video_desc))
                        <div class="block page_l2">
                            <div class="page_page__desc2 desc">
                                {!! $page->video_desc !!}
                            </div>
                        </div>
                    @endif


                    @if(isset($page->gallery))

                        <div class="ob_gallery pad_t36  pad_b20 ">

                            @foreach($page->gallery as $g)
                                <div class="mItem">
                                    <a href="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                                       data-fancybox="gallery"><img class="pc_category_img" style="width: 264px; height: auto"
                                                                    loading="lazy"
                                                                    src="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                                                                    alt="{{($page->gallery_img_title)??''}}"></a></div>
                            @endforeach

                        </div>
                    @endif

                    @if($page->gallery_desc)
                        <div class="gallery_desc desc">
                            {!! $page->gallery_desc  !!}
                        </div>
                    @endif









            </div>

            @include('pages.catalog.object.partial._object_menu__js')

            @if($page->css)
                <style>
                    {!! $page->css !!}
                </style>
            @endif

        </div>
    </main>

@endsection
