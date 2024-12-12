<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<main class="flex-grow-1">
	<div class="container py-3">
		<div class="g-3 justify-content-center row">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><?= number_to_currency(esc($product->price), 'IDR', 'id_ID', 0) ?></h5>
						<h6 class="card-subtitle"><?= esc($product->name) ?></h6>
						<p class="card-text"><?= number_format(esc($product->quantity), 0, ',', '.') ?> pcs</p>
						<a class="btn btn-secondary btn-sm" href="<?= url_to('ProductController::index') ?>">
							<i class="bi bi-arrow-left"></i>
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?= $this->endSection() ?>
