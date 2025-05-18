<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Visão Geral
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
                <!-- <div class="col-auto ms-auto d-print-none">
                    <div class="ms-auto lh-1">
                        <div class="dropdown">
                            <button class="btn btn-outline btn-primary dropdown-toggle " href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
                                </svg>
                                Hoje
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item active" href="#">Hoje</a>
                                <a class="dropdown-item" href="#">Últimos 7 dias</a>
                                <a class="dropdown-item" href="#">Últimos 30 dias</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <?php if($this->access->see(module: 'client', action: 'manager')): ?>
                    <?php $this->load->view('client/components/container-cards', [
                        'activeCustomer'    => $activeClients,
                        'monthlyCustomers'  => $recurrentClients,
                        'newCustomers'      => $newsClients,
                        'inactiveCustomers' => $inactiveClients,
                    ]) ?>
                <?php endif ?>
            </div>

            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title mb-2">
                            Agenda
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <div id="schedule-calendar" style="max-height: 600px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
							<div class="list-group list-group-flush overflow-auto" style="max-height: 35rem;">
								<?php foreach($remindersPerDay as $day => $reminders):  ?>

								<div class="list-group-header sticky-top">
									Dia <?= $day ?>
								</div>

									<?php foreach ($reminders as $reminder): ?>
										<div class="list-group-item" style="cursor: pointer;" onclick="openModalEditSchedule('<?= $reminder->id ?>')">
											<div class="row">
												<div class="col">
													<div class="text-body d-block"><?= $reminder->title ?></div>
													<div class="text-secondary mt-n1">
														<?= nl2br($reminder->reminder) ?>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>



			<div class="row row-cards mt-2">

				<?php if(!empty($utilLinks)): ?>

					<div class="col-md-5 col-lg-5">
					<div class="card">
						<div class="card-body">
							<div class="accordion" id="accordion-example">
								<?php foreach ($utilLinks as $group): ?>
									<?php if(!empty($group->links)): ?>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-1">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-group-<?= $group->id ?>" aria-expanded="true">
													<?= strtoupper($group->name) ?>
												</button>
											</h2>
											<div id="accordion-group-<?= $group->id ?>" class="accordion-collapse collapse list-group list-group-flush list-group-hoverable" data-bs-parent="#accordion-example" style="">
												<?php foreach ($group->links as $link): ?>
													<div class="accordion-body list-group-item">
														<div class="row align-items-center">
															<div class="col text-truncate">
																<a class="text-reset d-block" style="text-decoration: none"> <?= $link->name ?> </a>
																<div class="d-block text-secondary text-truncate mt-n1"> <?= $link->description ?> </div>
															</div>

															<div class="col-auto">
																<a href="<?= $link->url ?>" target="_blank" class="list-group-item-actions">
																	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
																		<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
																		<path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
																		<path d="M11 13l9 -9"></path>
																		<path d="M15 4h5v5"></path>
																	</svg>
																</a>
															</div>
														</div>
													</div>
												<?php endforeach ?>
											</div>
										</div>
									<?php endif ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
        </div>

		<?php $this->load->view('reminder/modals/reminder') ?>
