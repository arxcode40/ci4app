<!doctype html>
<html lang="en">
<head>
	<?= $this->include('layouts/meta') ?>

	<title><?= $title ?> | CRUD App</title>
	
	<?= $this->include('layouts/stylesheet') ?>
</head>
<body class="d-flex flex-column min-dvh-100">
	<?= $this->renderSection('content') ?>
	<button class="bottom-0 btn btn-secondary end-0 m-3 position-fixed shadow" id="scrollToTop" onclick="$(document).scrollTop(0);" style="display: none;" type="button">
		<i class="bi bi-arrow-up"></i>
	</button>
	
	<?= $this->include('layouts/script') ?>
</body>
</html>
