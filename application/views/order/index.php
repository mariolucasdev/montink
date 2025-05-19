<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header d-print-none">
			<div class="row align-items-center">
				<div class="col">
					<div class="page-pretitle"><?= $action ?></div>
					<h2 class="page-title"><?= $title ?></h2>
				</div>
			</div>
		</div>


		<div class="page-body">
			<div class="card">
				<div class="table-responsive">
					<?php if(empty($orders)): ?>
						<div class="card-body text-center py-4">
							<h2>Nenhum pedido encontrado</h2>
							<p>Assim que houverem registros eles aparecerão aqui.</p>
						</div>
					<?php else: ?>
						<table class="table">
							<thead>
								<tr>
									<th class="text-center"> ID:</th>
									<th> Cliente </th>
									<th> E-mail </th>
									<th> Status </th>
									<th> Valor </th>
									<th> Frete </th>
									<th> Total </th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orders as $order): ?>
									<tr>
										<td class="text-center" width="100"><?= $order->id ?></td>
										<td><?= $order->client ?></td>
										<td><?= $order->email ?></td>

										<td>
											<span class="badge bg-<?= $order->status == 'pending' ? 'yellow' : 'green' ?>">
												<?= strtoupper($order->status == 'pending' ? 'pendente' : 'concluído' ) ?>
											</span>
										</td>

										<td width="100"><?= format_currency($order->amount) ?></td>
										<td width="100"><?= format_currency($order->shipping) ?></td>
										<td width="150"> <strong><?= format_currency($order->total) ?></strong></td>
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