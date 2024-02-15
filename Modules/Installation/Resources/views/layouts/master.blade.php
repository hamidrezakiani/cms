@php
    $routeName = Route::currentRouteName();
    $assetUrl = DzHelper::GetBaseUrl('AssetUrl');
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ trans('installation::installer_messages.title') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('/installer/img/favicon/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('/installer/img/favicon/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('/installer/img/favicon/favicon-96x96.png') }}" sizes="96x96">
        <link href="{{ asset('/installer/css/style.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="master">
            <div class="box">
                <div class="header">
                    <h1 class="header__title">@yield('title')</h1>
                </div>
                <ul class="step">
                    <li class="step__divider"></li>
                    <li class="step__item {{ ($routeName == 'LaravelInstaller::final') ? 'active' : '' }}">
                        <i class="step__icon fa fa-server" aria-hidden="true"></i>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ ($routeName == 'LaravelInstaller::admin') ? 'active' : '' }}">
                        <i class="step__icon fa fa-user" aria-hidden="true"></i>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ ($routeName == 'LaravelInstaller::environmentWizard' || $routeName == 'LaravelInstaller::database') ? 'active' : '' }}">
                        @if(Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/database') )
                            <a href="{{ route('LaravelInstaller::environmentWizard') }}">
                                <i class="step__icon fa fa-cog" aria-hidden="true"></i>
                            </a>
                        @else
                            <i class="step__icon fa fa-cog" aria-hidden="true"></i>
                        @endif
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ ($routeName == 'LaravelInstaller::welcome') ? 'active' : '' }}">
                        @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                            <a href="{{ route('LaravelInstaller::welcome') }}">
                                <i class="step__icon fa fa-home" aria-hidden="true"></i>
                            </a>
                        @else
                            <i class="step__icon fa fa-home" aria-hidden="true"></i>
                        @endif
                    </li>
                    <li class="step__divider"></li>
                </ul>
                <div class="main">
                    @if (session('message'))
                        <p class="alert alert-danger text-center">
                            <strong>
                                @if(is_array(session('message')))
                                    {{ session('message')['message'] }}
                                @else
                                    {{ session('message') }}
                                @endif
                            </strong>
                        </p>
                    @endif
                    @if(session()->has('errors'))
                        <div class="alert alert-danger" id="error_alert">
                            <button type="button" class="close" id="close_alert" data-dismiss="alert" aria-hidden="true">
                                 <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('container')
                </div>
            </div>
        </div>
        <script src="{{ asset('/installer/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/installer/js/custom.js') }}"></script>
    </body>
</html>
