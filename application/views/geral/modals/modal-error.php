<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 9v2m0 4v.01" />
                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                </svg>
                <h3><?= $this->session->error ?></h3>

                <?php if ($this->session->description) : ?>
                    <div class="text-muted"><?= $this->session->description ?></div>
                <?php endif ?>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Fechar
                            </a>
                        </div>

                        <?php if ($this->session->button) : ?>
                            <div class="col">
                                <a href="<?= $this->session->link ?>" class="btn btn-danger w-100">
                                    <?= $this->session->button ?>
                                </a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" id="modalErrorTrigger" class="btn" style="display: none" data-bs-toggle="modal" data-bs-target="#modal-danger"></a>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const trigger = document.querySelector('#modalErrorTrigger');
        trigger.click()
    })
</script>