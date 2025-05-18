<div class="modal modal-blur fade" id="modalEditProduct" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-status"></div>

            <div class="modal-header">
                <h5 class="modal-title">Editar produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

			<div class="modal-body py-4">
                <form class="form" action="#" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="name">Nome: *</label>

                            <input
                                name="name"
                                type="text"
                                class="form-control mt-2"
                                id="name"
                                required
                                placeholder="Nome do produto">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="price" class="mb-2">Preço: *</label>
                            <input 
                                name="price"
                                type="text"
                                class="form-control"
                                id="price"
                                required
                                placeholder="R$ 0,00">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="stock">Estoque: *</label>
                            <input
                                name="stock"
                                class="form-control mt-2"
                                id="stock"
                                required
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-3 text-center">
                            <button type="submit" class="btn btn-blue btn-block form-control">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
