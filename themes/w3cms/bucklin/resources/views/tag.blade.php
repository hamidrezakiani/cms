@extends('layout.default')

@section('content')
<!-- Content -->

<div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt" style="background-image:url({{ theme_asset('images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">{{ __('Tags :') }} {{ isset($blog_tag->title) ? $blog_tag->title : '' }}</h1>
        </div>
    </div>
</div>

<div class="section-full bg-white content-inner">
    <div class="container">
        <div class="row">
            @if (DzHelper::dzHasSidebar())
            <div class="col-lg-8 col-md-7 col-sm-12 col-12">
            @else
            <div class="col-12">
            @endif
                <div class="row loadmore-content">
                    @forelse($blogs as $blog)
                        <div class="col-lg-6 m-b30">
                            <div class="blog-card blog-grid bg-dark">
                                <div class="blog-card-media">
                                    @if(optional($blog->feature_img)->value)
                                        <img src="{{ theme_asset('storage/blog-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                    @else
                                        <img src="{{ theme_asset('images/noimage.jpg') }}" alt="{{ __('Blog Image') }}">
                                    @endif
                                </div>
                                <div class="blog-card-info text-center">
                                    @php
                                        if($blog->visibility != 'Pu'){
                                            $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                        }else {
                                            $blog_visibility = '';
                                        }
                                    @endphp
                                    <h4 class="title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ $blog->title }}</a></h4>
                                    <div class="post-date">
                                        {{ $blog->publish_on }}
                                    </div>
                                    <p>
                                        {!! $blog->excerpt !!}
                                    </p>
                                    <ul class="add-info">
                                        <li><a href="{!! DzHelper::laraBlogLink($blog->id) !!}" class="btn outline radius-no white">{{ __('Read More') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-md-12">{{ __('No record found.') }}</div>
                    @endforelse
                    @if (!empty($blogs))
                        <div class="col-lg-12 m-b40">
                            {!! $blogs->links('elements.pagination') !!}
                        </div>
                    @endif
                </div>
            </div>
            @include('widgets.sidebar')
        </div>
    </div>
</div>

<!-- Content end -->
@endsection