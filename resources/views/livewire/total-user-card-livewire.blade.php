<div class="card">
	<div class="card-body">
		<div class="media align-items-center">
			<div class="avatar avatar-icon avatar-lg avatar-red">
				<i class="anticon anticon-usergroup-add"></i>
			</div>
			<div class="m-l-15">
				<h2 class="m-b-0" wire:poll.10s="update">{{ number_format($count) }}</h2>
				<p class="m-b-0 text-muted">Users</p>
				<div>
					<p>Last update: {{ now() }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
