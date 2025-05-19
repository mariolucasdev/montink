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
			<div class="row">
				<div class="col-md-4">
					<form id="form-cart" method="POST" action="<?= base_url('order/store') ?>">
						<div class="card">
							<div class="card-body">
								<h3 class="mb-3">Dados do cliente</h3>

								<div class="mb-3">
									<label for="client" class="form-label">Nome</label>
									<input type="text" required name="client" id="client" class="form-control" placeholder="Nome do cliente">
								</div>

								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" required name="email" id="email" class="form-control" placeholder="Email do cliente">
								</div>

								<div class="mb-3">
									<label for="cep" class="form-label">CEP</label>
									<input
										type="text"
										name="cep"
										id="cep"
										class="form-control cep  mb-2"
										required
										placeholder="CEP">
									<small id="cep-validation" class="form-text hidden"></small>
								</div>

								<div class="mb-3">
									<label for="address" class="form-label">Endereço</label>
									<input type="text" name="address" id="address" class="form-control" placeholder="Endereço do cliente">
								</div>
								
								<div class="mb-3">
									<button type="submit" class="btn btn-primary w-100">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon mx-1 icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										Finalizar pedido
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-8">
					<div class="card">
						<div class="table-responsive">
							<?php if(! $this->session->cart?->totalItems): ?>
								<div class="card-body text-center py-4">
									<h2>Seu carrinho está vazio.</h2>
									<p>Vá em produtos em adicione item no carrinho.</p>
								</div>
							<?php else: ?>
								<div class="card-body">
									<h3 class="mb-3">Itens do Pedido</h3>

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
													<td width="80">#<?= $key?></td>
													<td><?= $product->name ?></td>
													<td class="text-end" width="100"><?= format_currency($product->price) ?></td>
													<td class="text-center" width="100"><?= $product->qtd ?></td>
													<td width="100"><?= format_currency($product->priceTotal) ?></td>
			
													<td width="100" class="text-end">
														<a href="#" class="btn btn-danger btn-sm delete-product" onclick="removeItem(<?= $key ?>)">
															<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon mx-1 icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
														</a>
													</td>
												</tr>
											<?php endforeach ?>
											
											<tr>
												<td colspan="4" class="text-end">PRODUTOS</td>
												<td colspan="2" class="text-start">
													<strong><?= format_currency($this->session->cart->total) ?></strong>
												</td>
											</tr>
			
											<tr>
												<td colspan="4" class="text-end">FRETE</td>
												<td colspan="2" class="text-start">
													<strong><?= format_currency($this->session->cart->shipping) ?></strong>
												</td>
											</tr>
			
											<tr>
												<td colspan="4" class="text-end">TOTAL</td>
												<td colspan="2" class="text-start">
													<strong><?= format_currency($this->session->cart->total + $this->session->cart->shipping) ?></strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('cart/modals/edit-item') ?>
<?php $this->load->view('cart/modals/delete-item') ?>
<?php $this->load->view('cart/modals/clean-cart') ?>
