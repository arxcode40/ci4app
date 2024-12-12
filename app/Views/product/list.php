<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<main class="flex-grow-1">
	<div class="container py-3">
		<?= session()->getFlashData('alert') ?>

		<div class="card">
			<div class="align-items-center card-header d-flex">
				<h5 class="mb-0 me-auto">
					<i class="bi bi-table"></i>
					Product table
				</h5>
				<a class="btn btn-primary btn-sm" href="<?= url_to('ProductController::new') ?>">
					<i class="bi bi-plus-lg"></i>
					<span class="d-none d-sm-inline">Add new</span>
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="align-middle mb-0 table table-hover table-striped w-100">
						<thead>
							<tr class="align-middle">
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Quantity</th>
								<th scope="col">Price</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody class="table-group-divider">
							<?php if ($products === null): ?>
								<tr>
									<td class="text-center" colspan="5">No product data available.</td>
								</tr>
							<?php endif ?>

							<?php foreach ($products as $index => $product): ?>
								<tr class="align-middle">
									<th scope="row"><?= ++$index ?></th>
									<td><?= esc($product->name) ?></td>
									<td><?= number_format(esc($product->quantity), 0, ',', '.') ?> pcs</td>
									<td><?= number_to_currency(esc($product->price), 'IDR', 'id_ID', 0) ?></td>
									<td class="text-nowrap">
										<a class="btn btn-primary btn-sm" href="<?= url_to('ProductController::edit', esc($product->id)) ?>">
											<i class="bi bi-pencil-square"></i>
											<span class="d-none d-sm-inline">Edit</span>
										</a>
										<a class="btn btn-secondary btn-sm" href="<?= url_to('ProductController::show', esc($product->id)) ?>">
											<i class="bi bi-eye"></i>
											<span class="d-none d-sm-inline">Show</span>
										</a>
										<a class="btn btn-danger btn-sm" data-bs-target="#deleteProductModal" data-bs-toggle="modal" href="#">
											<i class="bi bi-trash-fill"></i>
											<span class="d-none d-sm-inline">Delete</span>
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

<div class="fade modal" id="deleteProductModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<form action="<?= url_to('ProductController::delete', esc($product->id)) ?>" class="modal-content" method="POST">
			<?= method_field('DELETE') ?>
			<?= csrf_field() ?>
			<div class="modal-header">
				<h5 class="modal-title">Delete product</h5>
				<button class="btn-close" data-bs-dismiss="modal" type="button"></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger mb-0">
					<i class="bi bi-x-circle-fill"></i>
					<span class="ms-2">Are you sure you want to delete this product?</span>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
					<i class="bi bi-x-lg"></i>
					Cancel
				</button>
				<button class="btn btn-danger" type="submit">
					<i class="bi bi-trash-fill"></i>
					Delete
				</button>
			</div>
		</form>
	</div>
</div>
<?= $this->endSection() ?>
