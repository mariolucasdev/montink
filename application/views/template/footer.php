<footer class="footer footer-transparent d-print-none text-center">
    <div class="container-xl">
        <div class="row text-center align-items-center">
            <div class="col-12 mt-3 mt-lg-0 text-center">
                &copy; <?= date('Y') ?><a href="<?= base_url() ?>" class="link-secondary"> Montink</a>.
                | With ❤️ By <a target="_blank" href="https://github.com/mariolucasdev"> Mário Lucas 💻 </a>
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
