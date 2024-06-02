@extends('layouts.app')

@section('content')
<div class="row align-items-center w-100">
	<div class="col-md-12 text-center">
		<img class="img-fluid" alt="" src="assets/images/logo/logo.svg">
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<livewire:total-active-chat-card-livewire></livewire:total-active-chat-card-livewire>
			</div>
			<div class="col-md-6 col-lg-4">
				<livewire:total-active-user-chat-card-livewire></livewire:total-active-user-chat-card-livewire>
			</div>
			<div class="col-md-6 col-lg-4">
				<livewire:total-chat-card-livewire></livewire:total-chat-card-livewire>
			</div>
			<div class="col-md-6 col-lg-4">
				<livewire:total-user-card-livewire></livewire:total-user-card-livewire>
			</div>
			<div class="col-md-6 col-lg-4">
				<livewire:total-user-verifed-card-livewire></livewire:total-user-verifed-card-livewire>
			</div>
			<div class="col-md-6 col-lg-4">
				<livewire:total-message-card-livewire></livewire:total-message-card-livewire>
			</div>
		</div>
	</div>
</div>
@endsection