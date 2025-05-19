<div class="modal modal-blur fade" id="modalDeleteProduct" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-status bg-danger"></div>
			<div class="modal-body text-center py-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
					<path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
					<path d="M12 8l0 4"></path>
					<path d="M12 16l.01 0"></path>
				</svg>
				<h3>Tem certeza que deseja excluir essa produto?</h3>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="#" class="btn w-100" data-bs-dismiss="modal">
								Fechar
							</a>
						</div>
						<div class="col">
							<a href="#" id="deleteProduct" class="btn btn-danger w-100">
								Tenho certeza!
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
