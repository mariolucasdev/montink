<?php $route = $this->router->class ?>

<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item <?= $route != 'product' ?: 'active' ?>">
                        <a class="nav-link" href="<?= base_url('produtos') ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                    <path d="M12 12l0 .01" />
                                    <path d="M3 13a20 20 0 0 0 18 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Produtos
                            </span>
                        </a>
                    </li>
                    <li class="nav-item <?= $route != 'order' ?: 'active' ?>">
                        <a class="nav-link" href="<?= base_url('pedidos') ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" /><path d="M3 9l4 0" /></svg>
                            </span>
                            <span class="nav-link-title">
                                Pedidos
                            </span>
                        </a>
                    </li>
                </ul>
                
                <?php if($this->session->cart?->totalItems): ?>
                    <div class="navbar-divider d-md-none"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item <?= $route != 'cart' ?: 'active' ?>">
                            <a class="nav-link" href="<?= base_url('carrinho') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                </span>
                                
                                <span class="nav-link-title">
                                    Carrinho
                                </span>
    
                                <?php if($this->session->cart?->totalItems > 0): ?>
                                    <span class="badge bg-red ms-1">
                                        <?= $this?->session->cart->totalItems ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
