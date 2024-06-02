<div class="card">
	<div class="card-body">
		<div class="media align-items-center">
			<div class="avatar avatar-icon avatar-lg avatar-blue">
				<i class="anticon anticon-message"></i>
			</div>
			<div class="m-l-15">
				<h2 class="m-b-0" wire:poll.10s="update">{{ number_format($count) }}</h2>
				<p class="m-b-0 text-muted">Active Chat</p>
				<div>
					<p>Last update: {{ now() }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
