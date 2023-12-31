@extends('layouts.master')
@section('content')
@include('components.breadcrumb', ['title' => 'Kelola Course', 'lists' => ['Home' => '/', 'Course' => '#', 'Detail' => '#']])

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ \Storage::url($course->banner) }}" class="img-fluid" alt="{{ $course->name }}">
					</div>
					<div class="col-md-8">
						<h3>{{ $course->name }}</h3>
						<p class="m-0">{{ $course->desc }}</p>
						<a href="{{ $course->trailer }}" class="btn btn-primary mt-3">Watch the trailer</a>
						<a href="" class="btn btn-success mt-3">Add new quickshots</a>
						<a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-outline-primary mt-3">Edit this course</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
