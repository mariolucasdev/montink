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
							<a onclick="cleanCart()" href="#" class="btn btn-danger">
								<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon mx-1 icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
								Esvaziar carrinho
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>


		<div class="page-body">
			<div class="card">
				<div class="table-responsive">
					<?php if(! $this->session->cart?->totalItems): ?>
						<div class="card-body text-center py-4">
							<h2>Seu carrinho está vazio.</h2>
							<p>Vá em produtos em adicione item no carrinho.</p>
						</div>
					<?php else: ?>
						<table class="table">
							<thead>
								<tr>
									<th> Item:</th>
									<th> Nome </th>
									<th class="text-end"> Valor Un. </th>
									<th class="text-center"> Qtd. </th>
									<th> Total </th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($this->session->cart->items as $key => $product): ?>
									<?php $key = $key + 1 ?>
									
									<tr>
										<td width="100">#<?= $key?></td>
										<td><?= $product->name ?></td>
										<td class="text-end" width="100"><?= format_currency($product->price) ?></td>
										<td class="text-center" width="100"><?= $product->qtd ?></td>
										<td width="100"><?= format_currency($product->priceTotal) ?></td>

										<td width="200" class="text-end">
											<!-- <a href="#" onclick="editItem(<?= $key ?>)" class="btn btn-sm">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon mx-1 icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
											</a> -->
											<a href="#" class="btn btn-danger btn-sm delete-product" onclick="removeItem(<?= $key ?>)">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon mx-1 icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
											</a>
										</td>
									</tr>
								<?php endforeach ?>

								<tr>
									<td colspan="4" class="text-end">
										<h3>CEP</h3>
									</td>
									<td colspan="2" class="text-start">
										<input
											type="text"
											name="cep"
											id="cep"
											class="form-control cep  mb-2"
											placeholder="CEP">

										<small id="cep-validation" class="form-text hidden"></small>
									</td>
								</tr>
								
								<tr>
									<td colspan="4" class="text-end">
										<h3>PRODUTOS</h3>
									</td>
									<td colspan="2" class="text-start">
										<h3><?= format_currency($this->session->cart->total) ?></h3>
									</td>
								</tr>

								<tr>
									<td colspan="4" class="text-end">
										<h3>FRETE</h3>
									</td>
									<td colspan="2" class="text-start">
										<h3><?= format_currency($this->session->cart->shipping) ?></h3>
									</td>
								</tr>

								<tr>
									<td colspan="4" class="text-end">
										<h3>TOTAL</h3>
									</td>
									<td colspan="2" class="text-start">
										<h3><?= format_currency($this->session->cart->total + $this->session->cart->shipping) ?></h3>
									</td>
								</tr>
							</tbody>
						</table>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('cart/modals/edit-item') ?>
<?php $this->load->view('cart/modals/delete-item') ?>
<?php $this->load->view('cart/modals/clean-cart') ?>
