@extends('installation::layouts.master')

@section('template_title')
    {{ trans('installation::installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-user fa-fw" aria-hidden="true"></i>
    {!! trans('installation::installer_messages.admin.wizard.title') !!}
@endsection

@section('container')

    <form method="post" action="{{ route('LaravelInstaller::saveAdmin') }}" class="tabs-wrap">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group {{ $errors->has('name') ? ' has-error ' : '' }}">
            <label for="name">
                {{ trans('installation::installer_messages.admin.name') }}
            </label>
            <input type="text" name="name" id="name" value="{{ old("name") }}" placeholder="{{ trans('installation::installer_messages.admin.name') }}" />
            @if ($errors->has('name'))
                <span class="error-block">
                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error ' : '' }}">
            <label for="email">
                {{ trans('installation::installer_messages.admin.email') }}
            </label>
            <input type="text" name="email" id="email" value="{{ old("email") }}" placeholder="{{ trans('installation::installer_messages.admin.email') }}" />
            @if ($errors->has('email'))
                <span class="error-block">
                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error ' : '' }}">
            <label for="password">
                {{ trans('installation::installer_messages.admin.password') }}
            </label>
            <input type="password" name="password" id="password" value="{{ old("password") }}" placeholder="{{ trans('installation::installer_messages.admin.password') }}" />
            @if ($errors->has('password'))
                <span class="error-block">
                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('confirm_password') ? ' has-error ' : '' }}">
            <label for="confirm_password">
                {{ trans('installation::installer_messages.admin.confirm_password') }}
            </label>
            <input type="password" name="confirm_password" id="confirm_password" value="{{ old("confirm_password") }}" placeholder="{{ trans('installation::installer_messages.admin.confirm_password') }}" />
            @if ($errors->has('confirm_password'))
                <span class="error-block">
                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                    {{ $errors->first('confirm_password') }}
                </span>
            @endif
        </div>

        <div class="buttons">
            <button class="button">
                {{ trans('installation::installer_messages.admin.save') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </button>
        </div>
    </form>
@endsection
