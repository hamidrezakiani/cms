{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="row page-titles mx-0 mb-3">
		<div class="col-sm-6 p-0">
			<div class="welcome-text">
				<h4>{{ __('Pages') }}</h4>
				<span>{{ __('All pages list') }}</span>
			</div>
		</div>
		<div class="col-sm-6 p-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('page.admin.index') }}">{{ __('Pages') }}</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('All pages') }}</a></li>
			</ol>
		</div>
	</div>

	@php
        $collapsed = 'collapsed';
        $show = '';
    @endphp

    @if(!empty(request()->title) || !empty(request()->status) || !empty(request()->from) || !empty(request()->to))
        @php
            $collapsed = '';
            $show = 'show';
        @endphp
    @endif

	<!-- row -->
	<!-- Row starts -->
	<div class="row">
		<!-- Column starts -->
		<div class="col-xl-12">
			<div class="card accordion accordion-rounded-stylish accordion-bordered" id="search-sec-outer">
				<div class="accordion-header rounded-lg {{ $collapsed }}" data-bs-toggle="collapse" data-bs-target="#rounded-search-sec">
					<span class="accordion-header-icon"></span>
                    <h4 class="accordion-header-text m-0">Search Pages</h4>
                    <span class="accordion-header-indicator"></span>
				</div>
				<div class="card-body collapse accordion__body {{ $show }}" id="rounded-search-sec" data-bs-parent="#search-sec-outer">
					<form action="{{ route('page.admin.index') }}" method="get">
					@csrf
						<input type="hidden" name="todo" value="Filter">
						<div class="row">
							<div class="col-md-2">
								<input type="search" name="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', request()->input('title')) }}">
							</div>
							<div class="col-md-3">
								<select name="status" class="default-select form-control">
									<option value="">{{ __('Select Status') }}</option>
									<option value="1" {{ old('status', request()->status) == 1 ? 'selected' : '' }}>{{ __('Published') }}</option>
									<option value="2" {{ old('status', request()->status) == 2 ? 'selected' : '' }}>{{ __('Draft') }}</option>
									<option value="3" {{ old('status', request()->status) == 3 ? 'selected' : '' }}>{{ __('Trash') }}</option>
									<option value="4" {{ old('status', request()->status) == 4 ? 'selected' : '' }}>{{ __('Private') }}</option>
									<option value="5" {{ old('status', request()->status) == 5 ? 'selected' : '' }}>{{ __('Pending') }}</option>
								</select>
							</div>
							<div class="col-md-2">
								<input type="search" name="from" class="form-control datetimepicker" id="PublishDateTimeTextbox" placeholder="{{ __('From Created') }}" value="{{ old('from', request()->from) }}">
							</div>
							<div class="col-md-2">
								<input type="search" name="to" class="form-control datetimepicker" placeholder="{{ __('To Created') }}" value="{{ old('to', request()->to) }}">
							</div>
							<div class="col-md-3 text-end">
								<input type="submit" name="search" value="{{ __('Search') }}" class="btn btn-primary me-2"> 
								<a href="{{ route('page.admin.index') }}" class="btn btn-danger">{{ __('Reset') }}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Column starts -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">{{ __('Pages') }}</h4>
					<div>
						@can('Controllers > PagesController > admin_create')
							<a href="{{ route('page.admin.create') }}" class="btn btn-primary">{{ __('Add Page') }}</a>
						@endcan
						<a href="{{ route('page.admin.trash_list') }}" class="btn btn-primary">{{ __('Trashed Pages') }}</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-responsive-lg mb-0">
							<thead>
								<tr>
									<th> <strong> {{ __('S.N.') }} </strong> </th>
									<th> <strong> {!! DzHelper::dzSortable('title', __('Title')) !!} </strong> </th>
									<th> <strong> {!! DzHelper::dzSortable('name.users', __('Author')) !!} </strong> </th>
									<th> <strong> {!! DzHelper::dzSortable('status', __('Status')) !!} </strong> </th>
									<th> <strong> {!! DzHelper::dzSortable('visibility', __('Visibility')) !!} </strong> </th>
									<th> <strong> {!! DzHelper::dzSortable('created_at', __('Created')) !!} </strong> </th>
									@canany(['Controllers > PagesController > admin_edit', 'Controllers > PagesController > admin_destroy'])
										<th class="text-center"> <strong> {{ __('Actions') }} </strong> </th>
                                    @endcanany
								</tr>
							</thead>
							<tbody>
								@php
									$i = $pages->firstItem();
								@endphp
								@forelse ($pages as $page)
									<tr>
										<td> {{ $i++ }} </td>
										<td> {{ Str::limit($page->title, 30, ' ...') }} </td>
										<td> {{ $page->user_name }} </td>
										<td> {{ $status[$page->status] }} </td>
										<td> 
											@if ($page->visibility == 'Pr')
												<span class="badge badge-danger">{{ __('Private') }}</span>
											@elseif($page->visibility == 'PP')
												<span class="badge badge-warning">{{ __('Password Protected') }}</span>
											@else
												<span class="badge badge-success">{{ __('Public') }}</span>
											@endif
										</td>
										<td> {{ $page->created_at }} </td>
										<td class="text-center">
											@can('Controllers > PagesController > admin_edit')
												<a href="{{ route('page.admin.edit', $page->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
											@endcan
											@can('Controllers > PagesController > admin_destroy')
												<a href="{{ route('page.admin.admin_trash_status', $page->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
											@endcan
										</td>
									</tr>
								@empty
									<tr><td class="text-center" colspan="7"><p>{{ __('No pages found.') }}</p></td></tr>
								@endforelse

							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer">
					{{ $pages->onEachSide(2)->appends(Request::input())->links() }}
				</div>
			</div>
		</div>
	</div>

</div>


@endsection