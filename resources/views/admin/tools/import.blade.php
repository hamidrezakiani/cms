{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="row page-titles mx-0 mb-3">
        <div class="col-sm-6 p-0">
            <div class="welcome-text">
                <h4>{{ __('Tools') }}</h4>
                <span>{{ __('Import') }}</span>
            </div>
        </div>
        <div class="col-sm-6 p-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Tools') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Import') }}</a></li>
            </ol>
        </div>
    </div>

	<div class="card">
		<div class="card-header d-block">
			<h4 class="card-title">{{ __('Import') }}</h4>
		</div>
		<form action="{{ route('tools.admin.import') }}" id="export-filters" method="POST" enctype="multipart/form-data">
        @csrf
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-md-6">
						<p>{{ __('Place your xml File here :') }}</p>
						<div class="input-group">
			                <div class="form-file">
			                    <input type="file" name="xml_file" class="form-file-input form-control ps-2">
			                </div>
			            </div>
			            @error('xml_file')
							<p class="text-danger">
								{{ $message }}
							</p>
						@enderror
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>{{ __('Select a User to Reassign Author in your Content :') }}</p>
	                    <select name="user_id" class="form-control default-select">
							<option value="{{ Auth::user()->id }}">{{ __('Current Logged in User') }}</option>
							@forelse($users as $user)
								<option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}({{ $user->email }})</option>
							@empty
							@endforelse
						</select>
			            @error('user_id')
							<p class="text-danger">
								{{ $message }}
							</p>
						@enderror
					</div>
				</div>
			</div>	
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">{{ __('Import To Databse') }}</button>
			</div>
		</form>
	</div>

</div>

@endsection