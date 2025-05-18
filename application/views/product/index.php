<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header d-print-none">
			<div class="row align-items-center">
				<div class="col">
					<div class="page-pretitle"><?= $action ?></div>
					<h2 class="page-title"><?= $title ?></h2>
				</div>

				<div class="col-auto ms-auto d-print-none">
					<div class="btn-list">
						<span class="d-sm-inline">
							<a onclick="openProductForm(this)" href="#" class="btn btn-blue">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<line x1="12" y1="5" x2="12" y2="19" />
									<line x1="5" y1="12" x2="19" y2="12" />
								</svg>
								Cadastrar
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>


		<div class="page-body">
			<div class="card" id="createProductForm" style="display:none">
				<div class="card-header">
					<h3 class="card-title">Cadastrar produto</h3>
				</div>

				<div class="card-body">
					<form action="<?= base_url('product/store') ?>" method="post" autocomplete="off">

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="name">Nome: *</label>
								<input
									name="name"
									type="text"
									class="form-control mt-2"
									id="name"
									required
									placeholder="Nome do produto">
							</div>

							<div class="col-2 mb-2">
								<label for="price" class="mb-2">Preço: *</label>
								<input 
									name="price"
									type="text"
									class="form-control"
									id="price"
									required
									placeholder="R$ 0,00">
							</div>

							<div class="col-md-2 mb-2">
								<label for="due_date">Estoque: *</label>
								<input
									name="stock"
									class="form-control mt-2"
									id="stock"
									required
								>
							</div>
						</div>

						<div class="row">
							<div class="col-4 mt-3">
								<button type="submit" class="btn btn-blue btn-block form-control">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
										<path d="M9 12l2 2l4 -4"></path>
									</svg>
									Cadastrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div id="tableListProducts" class="card">
				<div class="table-responsive">
					<?php if(empty($products)): ?>
						<div class="card-body text-center py-4">
							<h2>Nenhum produto encontrado</h2>
							<p>Você pode cadastrar um novo produto clicando no botão "Cadastrar" acima.</p>
						</div>
					<?php else: ?>
						<table class="table">
							<thead>
								<tr>
									<th> ID:</th>
									<th> Nome </th>
									<th> Preço </th>
									<th> Estoque </th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($products as $product): ?>
									<tr>
										<td width="100"><?= $product->id ?></td>
										<td><?= $product->name ?></td>
										<td width="200"><?= $product->price ?></td>
										<td width="200"><?= $product->stock ?></td>
										<td width="200" class="text-end">
											<a href="#" onclick="editProduct(<?= $product->id ?>)" class="btn btn-sm">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon ms-2 icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
											</a>

											<a href="#" class="btn btn-danger btn-sm delete-product" onclick="deleteProduct(<?= $product->id ?>)">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon ms-2 icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
											</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('product/modals/edit-product') ?>
<?php $this->load->view('product/modals/delete-product') ?>
