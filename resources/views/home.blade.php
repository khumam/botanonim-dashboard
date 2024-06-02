@extends('layouts.master')

@section('content')
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
@endsection