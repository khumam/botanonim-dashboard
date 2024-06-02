@extends('layouts.master') @section('content') @include('components.breadcrumb',
['title' => 'Kelola Ads', 'lists' => ['Home' => '/', 'Ads' => '#', 'Detail' =>
'#']])

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<tr>
							<td width="200">Customer</td>
							<td>{{ $ads->customer }}</td>
						</tr>
						<tr>
							<td>Customer contact</td>
							<td>{{ $ads->customer_contact }}</td>
						</tr>
						<tr>
							<td>Start</td>
							<td>{{ $ads->start_at }}</td>
						</tr>
						<tr>
							<td>End</td>
							<td>{{ $ads->end_at }}</td>
						</tr>
						<tr>
							<td>CTA</td>
							<td>{{ $cta[0]->text }}<br>{{ $cta[0]->url }}</td>
						</tr>
						<tr>
							<td>Views</td>
							<td>{{ number_format($ads->views) }}</td>
						</tr>
						<tr>
							<td>Clicks</td>
							<td>{{ number_format($ads->clicks) }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Konten</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<img src="{{ \Storage::url('media/' . $ads->image) }}" class="img-fluid" alt="">
					</div>
					<div class="col">
						<p class="mt-5">{{ $ads->content }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
