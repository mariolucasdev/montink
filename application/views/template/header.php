<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>Montink - <?= @$title ?></title>
    
    <link rel="shortcut icon" href="<?= base_url('assets/static/icon.png') ?>" type="image/x-icon">
    <link href="<?= base_url('assets/dist/css/tabler.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/tabler-flags.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/tabler-payments.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/tabler-vendors.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/demo.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/difference.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/datatables.1.13.2.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

	<!-- select 2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<style>
		@media print {
			.no-print {
				display: none;
			}
		}
	</style>
    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>

    <!-- Jquery mask -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <!-- Toastfy library -->
    <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- TinyMCE library-->
    <script
        src="<?= base_url('assets/dist/libs/tinymce/tinymce.min.js') ?>"
        type="text/javascript"></script>

</head>
<body>
