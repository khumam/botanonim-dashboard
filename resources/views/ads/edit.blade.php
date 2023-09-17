@extends('layouts.master')
@section('content')
@include('components.breadcrumb', ['title' => 'Kelola Ads', 'lists' => ['Home' => '/', 'Ads' => '#', 'Edit' => '#']])

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.ads.update', $ads->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="row">
										<div class="col">
											<div class="form-group">
												<label for="customer">Customer</label>
												<input type="text" id="customer" name="customer" class="form-control @error('customer') is-invalid @enderror" placeholder="Customer" value="{{ $ads->customer }}" required>
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
												<input type="text" id="customer_contact" name="customer_contact" class="form-control @error('customer_contact') is-invalid @enderror" placeholder="Customer contact" value="{{ $ads->customer_contact }}" required>
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
												<input type="date" id="start_at" name="start_at" class="form-control @error('start_at') is-invalid @enderror" placeholder="Start" value="{{ \Carbon\Carbon::parse($ads->start_at)->format('Y-m-d') }}" required>
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
												<input type="date" id="end_at" name="end_at" class="form-control @error('end_at') is-invalid @enderror" placeholder="End" value="{{ \Carbon\Carbon::parse($ads->end_at)->format('Y-m-d') }}" required>
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
										<textarea type="date" id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content" required>{{ $ads->content }}</textarea>
										@error('content')
											<div class="invalid-feedback" role="alert">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<img src="{{ \Storage::url('media/' . $ads->image) }}" class="img-fluid mb-3" alt="">
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
												<input type="text" id="cta_text" name="cta_text" class="form-control @error('cta_text') is-invalid @enderror" placeholder="Start" value="{{ $cta[0]->text }}" required>
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
												<input type="text" id="cta_link" name="cta_link" class="form-control @error('cta_link') is-invalid @enderror" placeholder="End" value="{{ $cta[0]->url }}" required>
												@error('cta_link')
													<div class="invalid-feedback" role="alert">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<button class="btn btn-success">Simpan iklan</button>
									</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
