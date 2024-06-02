@extends('layouts.master')
@section('content')
@include('components.breadcrumb', ['title' => 'Kelola Ads', 'lists' => ['Home' => '/', 'Ads' => '#', 'Create' => '#']])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="customer">Customer</label>
												<input type="text" id="customer" name="customer" class="form-control @error('customer') is-invalid @enderror" placeholder="Customer" value="{{ old('customer') }}" required>
												@error('customer')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="customer_contact">Customer contact</label>
												<input type="text" id="customer_contact" name="customer_contact" class="form-control @error('customer_contact') is-invalid @enderror" placeholder="Customer contact" value="{{ old('customer_contact') }}" required>
												@error('customer_contact')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="start_at">Start</label>
												<input type="date" id="start_at" name="start_at" class="form-control @error('start_at') is-invalid @enderror" placeholder="Start" value="{{ old('start_at') }}" required>
												@error('start_at')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="end_at">End</label>
												<input type="date" id="end_at" name="end_at" class="form-control @error('end_at') is-invalid @enderror" placeholder="End" value="{{ old('end_at') }}" required>
												@error('end_at')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="content">Content</label>
										<textarea type="date" id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content" required>{{ old('content') }}</textarea>
										@error('content')
											<div class="invalid-feedback" role="alert">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="image">Image</label>
										<input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="End" value="{{ old('image') }}">
										@error('image')
											<div class="invalid-feedback" role="alert">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="cta_text">CTA Text</label>
												<input type="text" id="cta_text" name="cta_text" class="form-control @error('cta_text') is-invalid @enderror" placeholder="Start" value="{{ old('cta_text') }}" required>
												@error('cta_text')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="cta_link">CTA link</label>
												<input type="text" id="cta_link" name="cta_link" class="form-control @error('cta_link') is-invalid @enderror" placeholder="End" value="{{ old('cta_link') }}" required>
												@error('cta_link')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<button class="btn btn-success">Tambah iklan</button>
									</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
