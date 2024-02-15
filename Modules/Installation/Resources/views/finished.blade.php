@extends('installation::layouts.master')

@section('template_title')
    {{ trans('installation::installer_messages.final.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    {{ trans('installation::installer_messages.final.title') }}
@endsection

@section('container')

    <div class="buttons">
        <a href="{{ url('/admin') }}" class="button">{{ trans('installation::installer_messages.final.exit') }}</a>
    </div>

@endsection
