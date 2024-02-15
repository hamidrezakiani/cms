{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="row page-titles mx-0 mb-3">
        <div class="col-sm-6 p-0">
            <div class="welcome-text">
                <h4>{{ __('Import To Databse') }}</h4>
                <span>{{ __('Export') }}</span>
            </div>
        </div>
        <div class="col-sm-6 p-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Tools') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Export') }}</a></li>
            </ol>
        </div>
    </div>

	<div class="card">
		<div class="card-header d-block">
			<h4 class="card-title">{{ __('Export') }}</h4>
		</div>
		<form action="{{ route('tools.admin.export') }}" id="export-filters" method="POST" enctype="multipart/form-data">
        @csrf
			<div class="card-body">
				<div class="basic-form">
					<div class="row align-items-center">
						<div class="col-12">
							<p class="m-0">{{ __('When you click the button below W3cms will create an XML file of your content for you to save to your computer.') }}</p>
							<p class="m-0">{{ __('This format will contain your posts, pages, comments, custom fields, categories, and tags.') }}</p>
							<p class="m-">{{ __('Once you’ve saved the download file, you can use the Import function in another W3cms installation to import the content from this site.') }}</p>
							<h6>{{ __('Choose what to export') }}</h6>
						</div>
						<div class="form-group col-sm-12">
							<div class="form-check col-sm-6">
								<label class="form-check-label" for="all_content">{{ __('All Content') }}</label>
								<input class="form-check-input" type="radio" id="all_content" name="content" value="all_content" checked>
							</div>
							<hr>
							<div class="form-check col-sm-6">
								<label class="form-check-label" for="posts">{{ __('Posts') }}</label>
								<input class="form-check-input" type="radio" id="posts" name="content" value="posts">
							</div>
							<div id="post-filters" class="row export-filters mb-3">
								<hr>
								<div class="col-md-4">
									<label for="category_id">{{ __('Categories:') }}</label>
									<select name='category_id' id="category_id" class="form-control default-select">
										<option value='0' >{{ __('All') }}</option>
										@forelse($categories as $category)
											<option value="{{ $category->id }}">{{ $category->title }}</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="col-md-4">
									<label for="post_user_id">{{ __('Authors:') }}</label>
									<select name="post_user_id" class="form-control default-select">
										<option value="0">{{ __('All') }}</option>
										@forelse($blogUsers as $user)
											<option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}({{ $user->email }})</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="col-md-4">
									<label for="post_status">{{ __('Status:') }}</label>
									<select name="post_status" id="post_status" class="form-control default-select">
										<option value="0">{{ __('All') }}</option>
										@forelse($blogStatus as $key => $value)
											<option value="{{ $key }}">{{ $value }}</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="col-md-4">
									<label for="post_start_date">{{ __('Start Date:') }}</label>
									<input type="date" name="post_start_date" class="form-control" id="post_start_date">
								</div>
								<div class="col-md-4">
									<label for="post_end_date">{{ __('End Date:') }}</label>
									<input type="date" name="post_end_date" class="form-control" id="post_end_date">
								</div>
							</div>
							<div class="form-check col-sm-6">
								<label class="form-check-label" for="pages">{{ __('Pages') }}</label>
								<input class="form-check-input" type="radio" id="pages" name="content" value="pages">
							</div>
							<div id="page-filters" class="row export-filters mb-3">
								<hr>
								<div class="col-md-3">
									<label for="page_user_id">{{ __('Authors:') }}</label>
									<select name="page_user_id" class="form-control default-select">
										<option value="0">{{ __('All') }}</option>
										@forelse($pageUsers as $user)
											<option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}({{ $user->email }})</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="col-md-3">
									<label for="page_status">{{ __('Status:') }}</label>
									<select name="page_status" id="page_status" class="form-control default-select">
										<option value="0">All</option>
										@forelse($pageStatus as $key => $value)
											<option value="{{ $key }}">{{ $value }}</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="col-md-3">
									<label for="page_start_date">{{ __('Start Date:') }}</label>
									<input type="date" name="page_start_date" class="form-control" id="page_start_date">
								</div>
								<div class="col-md-3">
									<label for="page_end_date">{{ __('End Date:') }}</label>
									<input type="date" name="page_end_date" class="form-control" id="page_end_date">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">{{ __('Download File') }}</button>
			</div>
		</form>
	</div>

</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		jQuery( function($) {
			var form = $('#export-filters'),
				filters = form.find('.export-filters');
			filters.hide();
			form.find('input:radio').on( 'change', function() {
				filters.slideUp('fast');
				switch ( $(this).val() ) {
					case 'attachment': $('#attachment-filters').slideDown(); break;
					case 'posts': $('#post-filters').slideDown(); break;
					case 'pages': $('#page-filters').slideDown(); break;
				}
			});
		} );
	</script>
@endsection