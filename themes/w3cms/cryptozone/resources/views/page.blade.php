@extends('layout.default')

@section('content')
<!-- Content -->
        <!-- Page Detail -->

        @if (Str::contains($page->slug, 'home'))
            @include('elements.main-banner');
        @else
            <!-- Banner  -->
            <div class="dz-bnr-inr style-1 text-center">

                <div class="container">
                    <div class="dz-bnr-inr-entry">
                        <h1 class="text-center">{{ Str::limit($page->title, 20, ' ...') }}</h1>
                        <!-- Breadcrumb Row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($page->title, 10, ' ...') }}</li>
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
        @endif

        @if ($page)
            @if ($page->visibility == 'PP' && $status == 'locked')
            <div class="container">
                <form method="POST" action="" class="dz-form style-1 my-5 ">
                    @csrf
                    <p>{{ __('This content is password protected. To view it please enter your password below:') }}</p>

                    <div class=" row">
                        <div class="col-md-8 d-flex">
                            <div class="input-area col-sm-8">
                                <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                <div class=" input-line">
                                    <input id="password" type="password" class="form-control" required name="password">
                                </div>
                                @error('password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-sm-4 text-end">
                                <button type="submit" class="btn btn-primary btn-skew">
                                    <span>{{ __('Login') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            @if ($status == 'unlock_'.$page->id)
                {!! $page->content !!}

                <!-- Child Pages Detail End -->
                @if (optional($page->child_pages)->isNotEmpty())
                <div class="container">
                    <h4>{{ __('Related Pages') }}</h4>
                    <ul class="related-pages p-l m-b30">
                        @forelse($page->child_pages as $child_page)
                        <li>
                            -<a href="{{ DzHelper::laraPageLink($child_page->id) }}" class="pl-2 ">{{ $child_page->title }}</a>
                            @if ($child_page->child_pages->isNotEmpty())
                                {{ DzHelper::getChildPage($child_page->child_pages) }}
                            @endif
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                @endif
                <!-- Child Pages Detail End -->
            @endif
        @else
            <div class="col-12">{{ __('Page No Found.') }}</div>
        @endif
        <!-- Page Detail End -->
        
<!-- Content end -->
@endsection