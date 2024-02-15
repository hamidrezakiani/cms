@php
$appUrl =  str_replace('public', '', url('/'));
$assetUrl = DzHelper::GetBaseUrl('AssetUrl');
@endphp

@extends('installation::layouts.master')

@section('template_title')
    {{ trans('installation::installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-magic fa-fw" aria-hidden="true"></i>
    {!! trans('installation::installer_messages.environment.wizard.title') !!}
@endsection

@section('container')
    <div class="tabs tabs-full">

        <input id="tab1" type="radio" name="tabs" class="tab-input" checked />
        <label for="tab1" class="tab-label">
            <i class="fa fa-cog fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installation::installer_messages.environment.wizard.tabs.environment') }}
        </label>

        <input id="tab2" type="radio" name="tabs" class="tab-input" />
        <label for="tab2" class="tab-label">
            <i class="fa fa-database fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installation::installer_messages.environment.wizard.tabs.database') }}
        </label>

        <input id="tab3" type="radio" name="tabs" class="tab-input" />
        <label for="tab3" class="tab-label">
            <i class="fa fa-cogs fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installation::installer_messages.environment.wizard.tabs.application') }}
        </label>

        <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}" class="tabs-wrap">
            <div class="tab" id="tab1content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('app_name') ? ' has-error ' : '' }}">
                    <label for="app_name">
                        {{ trans('installation::installer_messages.environment.wizard.form.app_name_label') }}
                    </label>
                    <input type="text" name="app_name" id="app_name" value="{{ old('app_name', config('app.name')) }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_name_placeholder') }}" />
                    @if ($errors->has('app_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('environment') ? ' has-error ' : '' }}">
                    <label for="environment">
                        {{ trans('installation::installer_messages.environment.wizard.form.app_environment_label') }}
                    </label>
                    <select name="environment" id="environment">
                        <option value="local" {{ old('environment', config('app.env')) == 'local' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_environment_label_local') }}</option>
                        <option value="development" {{ old('environment', config('app.env')) == 'development' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_environment_label_developement') }}</option>
                        <option value="qa" {{ old('environment', config('app.env')) == 'qa' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_environment_label_qa') }}</option>
                        <option value="production" {{ old('environment', config('app.env')) == 'production' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_environment_label_production') }}</option>
                        <option value="other" {{ old('environment', config('app.env')) == 'other' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_environment_label_other') }}</option>
                    </select>
                    <div id="environment_text_input" class="{{ old('environment', config('app.env')) == 'other' ? '' : 'd-none' }}">
                        <input type="text" name="environment_custom" id="environment_custom" value="{{ old('environment_custom') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_environment_placeholder_other') }}"/>
                    </div>
                    @if ($errors->has('app_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('app_debug') ? ' has-error ' : '' }}">
                    <label for="app_debug">
                        {{ trans('installation::installer_messages.environment.wizard.form.app_debug_label') }}
                    </label>
                    <label for="app_debug_true">
                        <input type="radio" name="app_debug" id="app_debug_true" value="true" {{ old('app_debug', config('app.debug')) == true ? 'checked' : '' }} />
                        {{ trans('installation::installer_messages.environment.wizard.form.app_debug_label_true') }}
                    </label>
                    <label for="app_debug_false">
                        <input type="radio" name="app_debug" id="app_debug_false" value="false" {{ old('app_debug', config('app.debug')) == false ? 'checked' : '' }} />
                        {{ trans('installation::installer_messages.environment.wizard.form.app_debug_label_false') }}
                    </label>
                    @if ($errors->has('app_debug'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_debug') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('app_log_level') ? ' has-error ' : '' }}">
                    <label for="app_log_level">
                        {{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label') }}
                    </label>
                    <select name="app_log_level" id="app_log_level">
                        <option value="debug" {{ old('app_log_level') == 'debug' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_debug') }}</option>
                        <option value="info" {{ old('app_log_level') == 'info' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_info') }}</option>
                        <option value="notice" {{ old('app_log_level') == 'notice' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_notice') }}</option>
                        <option value="warning" {{ old('app_log_level') == 'warning' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_warning') }}</option>
                        <option value="error" {{ old('app_log_level') == 'error' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_error') }}</option>
                        <option value="critical" {{ old('app_log_level') == 'critical' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_critical') }}</option>
                        <option value="alert" {{ old('app_log_level') == 'alert' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_alert') }}</option>
                        <option value="emergency" {{ old('app_log_level') == 'emergency' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.app_log_level_label_emergency') }}</option>
                    </select>
                    @if ($errors->has('app_log_level'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_log_level') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('app_url') ? ' has-error ' : '' }}">
                    <label for="app_url">
                        {{ trans('installation::installer_messages.environment.wizard.form.app_url_label') }}
                    </label>
                    <input type="url" name="app_url" id="app_url" value="{{ old('app_url', $appUrl) }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_url_placeholder') }}" />
                    @if ($errors->has('app_url'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_url') }}
                        </span>
                    @endif
                </div>

                <div class="buttons">
                    <button type="button" class="button SetpChangeBtn" rel="db-step">
                        {{ trans('installation::installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="tab" id="tab2content">

                <div class="form-group {{ $errors->has('database_connection') ? ' has-error ' : '' }}">
                    <label for="database_connection">
                        {{ trans('installation::installer_messages.environment.wizard.form.db_connection_label') }}
                    </label>
                    <select name="database_connection" id="database_connection">
                        <option value="mysql" {{ old('database_connection') == 'mysql' ? 'selected' : '' }}>{{ trans('installation::installer_messages.environment.wizard.form.db_connection_label_mysql') }}</option>
                    </select>
                    @if ($errors->has('database_connection'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_connection') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">
                    <label for="database_hostname">
                        {{ trans('installation::installer_messages.environment.wizard.form.db_host_label') }}
                    </label>
                    <input type="text" name="database_hostname" id="database_hostname" value="{{ old('database_hostname', '127.0.0.1') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.db_host_placeholder') }}" />
                    @if ($errors->has('database_hostname'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_hostname') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_port') ? ' has-error ' : '' }}">
                    <label for="database_port">
                        {{ trans('installation::installer_messages.environment.wizard.form.db_port_label') }}
                    </label>
                    <input type="number" name="database_port" id="database_port" value="{{ old('database_port', '3306') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.db_port_placeholder') }}" />
                    @if ($errors->has('database_port'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_port') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_name') ? ' has-error ' : '' }}">
                    <label for="database_name">
                        {{ trans('installation::installer_messages.environment.wizard.form.db_name_label') }}
                    </label>
                    <input type="text" name="database_name" id="database_name" value="{{ old('database_name', env('DB_DATABASE')) }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.db_name_placeholder') }}" />
                    @if ($errors->has('database_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_username') ? ' has-error ' : '' }}">
                    <label for="database_username">
                        {{ trans('installation::installer_messages.environment.wizard.form.db_username_label') }}
                    </label>
                    <input type="text" name="database_username" id="database_username" value="{{ old('database_username', env('DB_USERNAME')) }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.db_username_placeholder') }}" />
                    @if ($errors->has('database_username'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_username') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_password') ? ' has-error ' : '' }}">
                    <label for="database_password">
                        {{ trans('installation::installer_messages.environment.wizard.form.db_password_label') }}
                    </label>
                    <input type="password" name="database_password" id="database_password" value="{{ old('database_password', env('DB_PASSWORD')) }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.db_password_placeholder') }}" />
                    @if ($errors->has('database_password'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_password') }}
                        </span>
                    @endif
                </div>

                <div class="buttons">
                    <button type="button" class="button SetpChangeBtn" rel="app-step">
                        {{ trans('installation::installer_messages.environment.wizard.form.buttons.setup_application') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="tab" id="tab3content">
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab1" value="null" checked />
                    <label for="appSettingsTab1">
                        <span>
                            {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.broadcasting_title') }}
                        </span>
                    </label>
                    <div class="info">
                        <div class="form-group {{ $errors->has('broadcast_driver') ? ' has-error ' : '' }}">
                            <label for="broadcast_driver">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.broadcasting_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/broadcasting" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="broadcast_driver" id="broadcast_driver" value="{{ old('broadcast_driver', 'log') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.broadcasting_placeholder') }}" />
                            @if ($errors->has('broadcast_driver'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('broadcast_driver') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('cache_driver') ? ' has-error ' : '' }}">
                            <label for="cache_driver">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.cache_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/cache" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="cache_driver" id="cache_driver" value="{{ old('cache_driver', 'file') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.cache_placeholder') }}" />
                            @if ($errors->has('cache_driver'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('cache_driver') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('filesystem_driver') ? ' has-error ' : '' }}">
                            <label for="filesystem_driver">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.filesystem_driver_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/cache" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="filesystem_driver" id="filesystem_driver" value="{{ old('filesystem_driver', 'local') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.filesystem_driver_placeholder') }}" />
                            @if ($errors->has('filesystem_driver'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('filesystem_driver') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('queue_connection') ? ' has-error ' : '' }}">
                            <label for="queue_connection">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.queue_connection_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/queues" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="queue_connection" id="queue_connection" value="{{ old('queue_connection', 'sync') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.queue_connection_placeholder') }}" />
                            @if ($errors->has('queue_connection'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('queue_connection') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                            <label for="session_driver">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.session_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/session" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="session_driver" id="session_driver" value="{{ old('session_driver', 'file') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.session_placeholder') }}" />
                            @if ($errors->has('session_driver'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('session_driver') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab2" value="null"/>
                    <label for="appSettingsTab2">
                        <span>
                            {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_label') }}
                        </span>
                    </label>
                    <div class="info">
                        <div class="form-group {{ $errors->has('redis_hostname') ? ' has-error ' : '' }}">
                            <label for="redis_hostname">
                                {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_host') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/redis" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="redis_hostname" id="redis_hostname" value="{{ old('redis_hostname', '127.0.0.1') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_host') }}" />
                            @if ($errors->has('redis_hostname'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_hostname') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('redis_password') ? ' has-error ' : '' }}">
                            <label for="redis_password">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_password') }}</label>
                            <input type="password" name="redis_password" id="redis_password" value="{{ old('redis_password', 'null') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_password') }}" />
                            @if ($errors->has('redis_password'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_password') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('redis_port') ? ' has-error ' : '' }}">
                            <label for="redis_port">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_port') }}</label>
                            <input type="number" name="redis_port" id="redis_port" value="{{ old('redis_port', '6379') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.redis_port') }}" />
                            @if ($errors->has('redis_port'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_port') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab3" value="null"/>
                    <label for="appSettingsTab3">
                        <span>
                            {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_label') }}
                        </span>
                    </label>
                    <div class="info">
                        <div class="form-group {{ $errors->has('mail_driver') ? ' has-error ' : '' }}">
                            <label for="mail_driver">
                                {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_driver_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/mail" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="mail_driver" id="mail_driver" value="{{ old('mail_driver', 'smtp') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_driver_placeholder') }}" />
                            @if ($errors->has('mail_driver'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_driver') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                            <label for="mail_host">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_host_label') }}</label>
                            <input type="text" name="mail_host" id="mail_host" value="{{ old('mail_host', 'smtp.mailtrap.io') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}" />
                            @if ($errors->has('mail_host'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_host') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                            <label for="mail_port">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_port_label') }}</label>
                            <input type="number" name="mail_port" id="mail_port" value="{{ old('mail_port', '25') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_port_placeholder') }}" />
                            @if ($errors->has('mail_port'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_port') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('mail_username') ? ' has-error ' : '' }}">
                            <label for="mail_username">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_username_label') }}</label>
                            <input type="text" name="mail_username" id="mail_username" value="{{ old('mail_username', 'null') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_username_placeholder') }}" />
                            @if ($errors->has('mail_username'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_username') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('mail_password') ? ' has-error ' : '' }}">
                            <label for="mail_password">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_password_label') }}</label>
                            <input type="text" name="mail_password" id="mail_password" value="{{ old('mail_password', 'null') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_password_placeholder') }}" />
                            @if ($errors->has('mail_password'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('mail_encryption') ? ' has-error ' : '' }}">
                            <label for="mail_encryption">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_encryption_label') }}</label>
                            <input type="text" name="mail_encryption" id="mail_encryption" value="{{ old('mail_encryption', 'null') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.mail_encryption_placeholder') }}" />
                            @if ($errors->has('mail_encryption'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_encryption') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab4" value="null"/>
                    <label for="appSettingsTab4">
                        <span>
                            {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_label') }}
                        </span>
                    </label>
                    <div class="info">
                        <div class="form-group {{ $errors->has('aws_access_key') ? ' has-error ' : '' }}">
                            <label for="aws_access_key">
                                {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_access_key_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/9.x/mail" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="aws_access_key" id="aws_access_key" value="{{ old('aws_access_key') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_access_key_placeholder') }}" />
                            @if ($errors->has('aws_access_key'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_access_key') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('aws_secret_key') ? ' has-error ' : '' }}">
                            <label for="aws_secret_key">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_secret_key_label') }}</label>
                            <input type="text" name="aws_secret_key" id="aws_secret_key" value="{{ old('aws_secret_key') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_secret_key_placeholder') }}" />
                            @if ($errors->has('aws_secret_key'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_secret_key') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('aws_default_region') ? ' has-error ' : '' }}">
                            <label for="aws_default_region">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_default_region_label') }}</label>
                            <input type="text" name="aws_default_region" id="aws_default_region" value="{{ old('aws_access_key', 'us-east-1') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_default_region_placeholder') }}" />
                            @if ($errors->has('aws_default_region'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_default_region') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('aws_bucket') ? ' has-error ' : '' }}">
                            <label for="aws_bucket">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_bucket_label') }}</label>
                            <input type="text" name="aws_bucket" id="aws_bucket" value="{{ old('aws_bucket') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_bucket_placeholder') }}" />
                            @if ($errors->has('aws_bucket'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_bucket') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('aws_endpoint') ? ' has-error ' : '' }}">
                            <label for="aws_endpoint">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_endpoint_label') }}</label>
                            <input type="text" name="aws_endpoint" id="aws_endpoint" value="{{ old('aws_endpoint', 'false') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.aws_endpoint_placeholder') }}" />
                            @if ($errors->has('aws_endpoint'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_endpoint') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="block margin-bottom-2">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab5" value="null"/>
                    <label for="appSettingsTab5">
                        <span>
                            {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_label') }}
                        </span>
                    </label>
                    <div class="info">
                        <div class="form-group {{ $errors->has('pusher_app_id') ? ' has-error ' : '' }}">
                            <label for="pusher_app_id">
                                {{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_app_id_label') }}
                                <sup>
                                    <a href="https://pusher.com/docs/server_api_guide" target="_blank" title="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="pusher_app_id" id="pusher_app_id" value="{{ old('pusher_app_id') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_app_id_palceholder') }}" />
                            @if ($errors->has('pusher_app_id'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('pusher_app_id') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('pusher_app_key') ? ' has-error ' : '' }}">
                            <label for="pusher_app_key">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_app_key_label') }}</label>
                            <input type="text" name="pusher_app_key" id="pusher_app_key" value="{{ old('pusher_app_key') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_app_key_palceholder') }}" />
                            @if ($errors->has('pusher_app_key'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('pusher_app_key') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('pusher_app_secret') ? ' has-error ' : '' }}">
                            <label for="pusher_app_secret">{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_label') }}</label>
                            <input type="password" name="pusher_app_secret" id="pusher_app_secret" value="{{ old('pusher_app_secret') }}" placeholder="{{ trans('installation::installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_palceholder') }}" />
                            @if ($errors->has('pusher_app_secret'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('pusher_app_secret') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button class="button" type="submit">
                        {{ trans('installation::installer_messages.environment.wizard.form.buttons.save') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
