<?php $route = $this->router->class ?>

<div class="wrapper">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="<?= base_url() ?>">
                    <span class="d-none d-sm-inline"> Montink </span>
                </a>
            </h1>

            <div class="navbar-nav flex-row order-md-last">
                <?php if ($this->router->class != 'migrate'): ?>
                    <a href="?theme=light" class="nav-link hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="4" />
                            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>

                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0">
                        <span class="avatar avatar-sm" style="background-image: url('')"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div> Mário Lucas </div>
                            <div class="mt-1 small text-muted"> mariolucasdev@gmail.com </div>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="#" class="nav-link px-0 hide-theme-dark"
                        title="Autalização de base de dados."
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg"class="icon icon-tabler icon-tabler-database me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0" />
							<path d="M4 6v6a8 3 0 0 0 16 0v-6" />
							<path d="M4 12v6a8 3 0 0 0 16 0v-6" />
						</svg>
                        Atualização de base de dados.
                    </a>
                <?php endif ?>
            </div>
        </div>
    </header>
