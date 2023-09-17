@extends('layouts.master')
@section('content')
@include('components.breadcrumb', ['title' => 'Kelola Report', 'lists' => ['Home' => '/', 'Report' => '#', 'Detail' => '#']])

<div class="row">
    <div class="col-md-4">
        <div class="card">
						<div class="card-header d-flex align-items-center">
							<h4 class="card-title">Terlapor</h4>
							<div>
								<form action="{{ route('admin.report.banned') }}" method='POST'>
                	@csrf
									<input type='hidden' value='{{ $report->id }}' name='report_id'>
									<button class='btn btn-danger btn-sm'>Ban!</button>
								</form>
							</div>
						</div>
            <div class="card-body">
							<p>{{ $report->reported->first_name }} {{ $report->reported->last_name }} (@ {{ $report->reported->username }}) </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
						<div class="card-header">
							<h4 class="card-title">Yang melapor</h4>
						</div>
            <div class="card-body">
							<p>{{ $report->reportedBy->first_name }} {{ $report->reportedBy->last_name }} (@ {{ $report->reportedBy->username }}) </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
						<div class="card-header">
							<h4 class="card-title">Alasan</h4>
						</div>
            <div class="card-body">
							<p>{{ $report->reason }} </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<livewire:message-user-livewire :chatId="$report->reported->id" :reportedDate="$report->created_at"></livewire:message-user-livewire>
	</div>
</div>
@endsection
