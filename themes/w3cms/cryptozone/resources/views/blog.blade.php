@extends('layout.default')

@section('content')

<!-- Content -->

    <!-- Blog Post -->
    
    <!-- Banner  -->
    <div class="dz-bnr-inr style-1 text-center">

        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1 class="text-center">{{ __('All Blogs') }}</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('All Blogs') }}</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
        <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="{{ __('Banner Shape 1') }}">
        <img class="bg-shape2" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="{{ __('Banner Shape 2') }}">
        <img class="bg-shape3" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="{{ __('Banner Shape 3') }}">
        <img class="bg-shape4" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="{{ __('Banner Shape 4') }}">
    
    </div>
    <!-- Banner End -->

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
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-lg-12' : 'col-lg-8' ; }} m-b30">
                                <div class="dz-card style-1 blog-half">
                                    <div class="dz-media">
                                        <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                                            @if(optional($blog->feature_img)->value)
                                                <img src="{{ asset('storage/blog-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                            @else
                                                <img src="{{ asset('images/noimage.jpg') }}" alt="{{ __('Blog Image') }}">
                                            @endif
                                        </a>
                                        <ul class="dz-badge-list">
                                            <li><a href="javascript:void(0);" class="dz-badge">{{ Carbon\Carbon::parse($blog->publish_on)->format('F j, Y') }}</a></li>
                                        </ul>
                                        <a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="btn btn-secondary">{{ __('Read More') }}</a>
                                    </div>
                                    <div class="dz-info">
                                        <div class="dz-meta">
                                            <ul>
                                                <li class="post-author">
                                                    <a href="{{ DzHelper::author($blog->user_id) }}">
                                                        <span>{{ __('By') }} {{ $blog->user->name }}</span>
                                                    </a>
                                                </li>
                                                <li class="post-date"><a href="javascript:void(0);">{{ Carbon\Carbon::parse($blog->publish_on)->format('F j, Y') }}</a></li>
                                            </ul>
                                        </div>
                                        @php
                                            if($blog->visibility != 'Pu'){
                                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ $blog_visibility }}{{ Str::limit($blog->title, 40, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-md-12">{{ __('Records Not found.') }}</div>
                        @endforelse
                        <div class="col-lg-12 m-b40">
                            {!! $blogs->links('elements.pagination') !!}
                        </div>
                    </div>
                </div>
                @include('widgets.sidebar')
            </div>
        </div>
    </div>
    <!-- Blog Post End -->

<!-- End Content -->

@endsection