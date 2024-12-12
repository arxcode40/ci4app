<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<main class="flex-grow-1">
	<div class="container py-3">
		<?= session()->getFlashData('alert') ?>

		<form action="<?= url_to('ProductController::create') ?>" class="card" method="POST">
			<?= csrf_field() ?>

			<div class="align-items-center card-header d-flex">
				<h5 class="mb-0 me-auto">
					<i class="bi bi-plus-lg"></i>
					Add new product
				</h5>
				<a class="btn btn-secondary btn-sm" href="<?= url_to('ProductController::index') ?>">
					<i class="bi bi-arrow-left"></i>
					<span class="d-none d-sm-inline">Back</span>
				</a>
			</div>
			<div class="card-body">
				<div class="gx-3 mb-3 row">
					<label class="col-md-4 col-lg-3 col-form-label d-md-flex" for="name">
						Product name<b class="text-danger">*</b>
						<span class="d-none d-md-block fw-medium ms-auto">:</span>
					</label>
					<div class="col-md-8 col-lg-9">
						<input autofocus="autofocus" class="form-control <?= validation_show_error('name') ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Enter product name" type="text" value="<?= old('name') ?>" />
						<?= validation_show_error('name', 'bs5_single') ?>
					</div>
				</div>
				<div class="gx-3 mb-3 row">
					<label class="col-md-4 col-lg-3 col-form-label d-md-flex" for="quantity">
						Product quantity<b class="text-danger">*</b>
						<span class="d-none d-md-block fw-medium ms-auto">:</span>
					</label>
					<div class="col-md-8 col-lg-9">
						<div class="has-validation input-group">
							<input class="form-control <?= validation_show_error('quantity') ? 'is-invalid' : '' ?>" id="quantity" inputmode="numeric" name="quantity" oninput="numberFormat();" placeholder="Enter product quantity" type="text" value="<?= old('quantity') ?>" />
							<span class="input-group-text">pcs</span>
							<?= validation_show_error('name', 'bs5_single') ?>
						</div>
					</div>
				</div>
				<div class="gx-3 row">
					<label class="col-md-4 col-lg-3 col-form-label d-md-flex" for="price">
						Product price<b class="text-danger">*</b>
						<span class="d-none d-md-block fw-medium ms-auto">:</span>
					</label>
					<div class="col-md-8 col-lg-9">
						<div class="has-validation input-group">
							<span class="input-group-text">Rp</span>
							<input class="form-control <?= validation_show_error('price') ? 'is-invalid' : '' ?>" id="price" inputmode="numeric" name="price" oninput="numberFormat();" placeholder="Enter product price" type="text" value="<?= old('price') ?>" />
							<?= validation_show_error('price', 'bs5_single') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary" type="submit">
					<i class="bi bi-plus-lg"></i>
					Create
				</button>
				<button class="btn btn-secondary" type="reset">
					<i class="bi bi-x-lg"></i>
					Reset
				</button>
			</div>
		</form>
	</div>
</main>
<?= $this->endSection() ?>
