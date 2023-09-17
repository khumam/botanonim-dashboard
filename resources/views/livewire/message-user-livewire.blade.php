<div class="card">
    <div class="card-header">
			<h4 class="card-title">Pesan terkirim oleh terlapor</h4>
		</div>
		<div class="card-body">
			@forelse($messages as $message)
			<p>- {{ $message->text }}</p>
			@empty
			Tidak ada pesan
			@endforelse
		</div>
</div>
