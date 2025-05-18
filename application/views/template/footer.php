<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center">
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; <?= date('Y') ?>
                        <a href="<?= base_url('') ?>" class="link-secondary">Montink</a>.
                        Todos os direitos reservados.
                    </li>
                    <li class="list-inline-item">
						Por <a target="_blank" href="https://mariolucas.me"> Mário Lucas 💻 </a> v1.0.0
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- table assets default template -->
<script src="<?= base_url('assets/dist/js/tabler.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/demo.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/demo-theme.min.js') ?>"></script>

<!-- load assets to current module class -->
<?= $this->template->loadAssets(
    $this->router->class,
    $this->router->method,
    $this->router->method == 'index'
)?>

<!-- create customized load assets -->
<?php /* $this->template->loadAssets('schedule', 'validation', false) */ ?>

<script src="<?= base_url('assets/geral/app.js') ?>"></script>

</body>

</html>
