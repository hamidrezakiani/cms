<header class="site-header mo-left header header-transparent style-1">

	<!-- Top Header -->
	{{-- <div class="top-bar">
		<div class="container">
			<div class="dz-topbar-inner d-flex justify-content-between align-items-center">
				<div class="dz-topbar-left">
					<ul>
						<li><i class="fa-regular fa-envelope"></i> {{ config('Site.email') }}</li>
					</ul>
				</div>
				<div class="dz-topbar-right">
					<ul>
						<li><i class="fa-regular fa-clock"></i> {{ config('Site.office_time') }}</li>
						<li><i class="fa fa-phone"></i> {{ config('Site.contact') }}</li>
					</ul>
				</div>
                <div class="dz-social-icon style-1">
                    <ul>
                        @foreach (HelpDesk::getSocialNetworks() as $item)
                            <li><a target="_blank" class="{{$item->params}}" href="{{ $item->value }}"></a></li>
                        @endforeach
                    </ul>
                </div>
			</div>
		</div>
	</div> --}}
    <div class="menu-area bg-color-black position-absolute">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 hamburger-menu position-relative">
                    <div class="menu-logo-wrap">
                        {{-- <a href="{{url('/')}}"><img src="assets/images/logo-white.svg" alt=""></a> --}}
                        <a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogo() }}" alt="{{ __('Site Logo') }}"/></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="nav-wrap d-flex justify-content-end align-items-center">
                        <div class="mainmenu text-right">
                            <ul>
                                <li class="has-child-menu"><a href="javascript:void(0)">Home</a>
                                    <ul>
                                        <li><a href="index.html">Home Version 01</a></li>
                                        <li><a href="home-two.html">Home Version 02</a></li>
                                        <li><a href="home-three.html">Home Version 03</a></li>
                                    </ul>
                                </li>
                                <li><a href="about-us.html">About</a></li>
                                <li class="has-child-menu"><a href="javascript:void(0)">Blog</a>
                                    <ul>
                                        <li><a href="blog-classic.html">Blog Classic</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-menu"><a href="javascript:void(0)">Pages</a>
                                    <ul>
                                        <li class="has-child-menu"><a href="javascript:void(0)">Service</a>
                                            <ul>
                                                <li><a href="service-one.html">Service One</a></li>
                                                <li><a href="service-two.html">Service Two</a></li>
                                                <li><a href="service-three.html">Service Three</a></li>
                                                <li><a href="service-details.html">Service Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-child-menu"><a href="javascript:void(0)">Project</a>
                                            <ul>
                                                <li><a href="project.html">Project</a></li>
                                                <li><a href="project-details.html">Project Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="team-details.html">Team Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                            <div class="menu-btn-wrap flex-shrink-0 d-lg-none pb-5">
                                <a class="common-btn white-border ms-3 mt-4" href="contact.html">
                                    <span>
                                        Get a quote
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.6875 7.71875L8.6875 12.7188C8.3125 13.125 7.65625 13.125 7.28125 12.7188C6.875 12.3438 6.875 11.6875 7.28125 11.3125L10.5625 8H1C0.4375 8 0 7.5625 0 7C0 6.46875 0.4375 6 1 6H10.5625L7.28125 2.71875C6.875 2.34375 6.875 1.6875 7.28125 1.3125C7.65625 0.90625 8.3125 0.90625 8.6875 1.3125L13.6875 6.3125C14.0938 6.6875 14.0938 7.34375 13.6875 7.71875Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-btn-wrap flex-shrink-0 d-none d-lg-block">
                            <a class="common-btn white-border" href="contact.html">
                                <span>
                                    Get a quote
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.6875 7.71875L8.6875 12.7188C8.3125 13.125 7.65625 13.125 7.28125 12.7188C6.875 12.3438 6.875 11.6875 7.28125 11.3125L10.5625 8H1C0.4375 8 0 7.5625 0 7C0 6.46875 0.4375 6 1 6H10.5625L7.28125 2.71875C6.875 2.34375 6.875 1.6875 7.28125 1.3125C7.65625 0.90625 8.3125 0.90625 8.6875 1.3125L13.6875 6.3125C14.0938 6.6875 14.0938 7.34375 13.6875 7.71875Z"
                                            fill="currentColor" />
                                    </svg>

                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Main Header -->
	{{-- <div class="sticky-header main-bar-wraper navbar-expand-lg col-md-12">
		<div class="main-bar clearfix">
			<div class="container clearfix">
				<div class="box-header clearfix">
					<!-- website logo -->
					<div class="logo-header mostion logo-dark">
						<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogo() }}" alt="{{ __('Site Logo') }}"/></a>
					</div>

					<!-- Nav Toggle Button -->
					{{-- <button class="navbar-toggler navbar-toggler-skew navbar-toggler navbar-toggler-skew-skew collapsed navicon justify-content-end" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button> --}}

					<!-- Extra Nav -->
					{{-- <div class="extra-nav">
						<div class="extra-cell">
							<button id="quik-search-btn" type="button" class="header-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
							{{-- <a href="{{ url('/contact') }}" class="btn btn-primary btn-skew appointment-btn"><span>{{ __('Contact Us') }}</span></a> --}}
						{{-- </div>
					</div> --}}
					<!-- Extra Nav -->

					<!-- Search Form -->
					{{-- <div class="dz-quik-search">
						<form method="get" action="{{ route('permalink.search') }}">
							<input name="s" value="" type="text" class="form-control" placeholder="{{ __('Enter Your Keyword ...') }}" required>
							<span type="submit" id="quik-search-remove"><i class="fa-solid fa-xmark"></i></span>
						</form>
					</div> --}}

					<!-- Main Nav -->
					{{-- <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">

						{{ DzHelper::nav_menu(
						  	array(
						 		'theme_location'  => 'primary',
						 		'menu_class'      => 'nav navbar-nav navbar navbar-left',
						  	)
						  ) }}
                          <div class="">
                            @php
                                $currentUrl = url()->current();
                                $current = explode('/', $currentUrl);
                            @endphp

                            @if (isset($current[3]) && $current[3] == 'en')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                                </svg
                                <a href="{{ url('/contact') }}" class="btn btn-primary btn-skew appointment-btn"><span>{{ __('') }}</span></a>
                                <a  href="{{url('/')}}">FA</a>
                            @endif --}}

                        {{-- </div> --}}




						{{-- <div class="dz-social-icon">
							<ul>
                                <li><a target="_blank" class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
                                <li><a target="_blank" class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
                                <li><a target="_blank" class="fab fa-whatsapp" href="{{ config('Social.whatsapp') }}"></a></li>
                                <li><a target="_blank" class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
							</ul>
						</div> --}}
					{{-- </div>

				</div>
			</div>
		</div>
	</div> --}}
	<!-- Main Header END -->
</header>
