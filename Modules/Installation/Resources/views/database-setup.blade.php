@extends('installation::layouts.master')

@section('template_title')
    {{ trans('installation::installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-user fa-fw" aria-hidden="true"></i>
    {!! trans('installation::installer_messages.admin.wizard.title') !!}
@endsection

@section('container')

    <form method="post" action="{{ route('LaravelInstaller::database') }}" class="tabs-wrap">
        @csrf
        <p class="db-installation-text">{{ __('Now communicate with your database click on Run Installation button.') }}</p> 
        <div class="buttons">
            <button class="button">
                {{ trans('installation::installer_messages.environment.wizard.form.buttons.installation') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </button>
        </div>
    </form>
@endsection
