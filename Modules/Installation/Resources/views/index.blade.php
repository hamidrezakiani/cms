@extends('installation::layouts.master')

@section('content')
    <h1>{{ __('Hello World') }}</h1>

    <p>
        {{ __('This view is loaded from module:') }} {!! config('installation.name') !!}
    </p>
@endsection
