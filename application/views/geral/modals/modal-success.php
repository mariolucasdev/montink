<div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-blue"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-blue icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="12" cy="12" r="9" />
                    <path d="M9 12l2 2l4 -4" />
                </svg>
                <h3><?= $this->session->success ?></h3>

                <?php if ($this->session->description) : ?>
                    <div class="text-muted"><?= $this->session->description ?></div>
                <?php endif ?>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Fechar
                            </a></div>
                        <?php if ($this->session->button) : ?>
                            <div class="col"><a href="<?= $this->session->link ?>" class="btn btn-blue w-100">
                                    <?= $this->session->button ?>
                                </a></div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" id="modalSuccessTrigger" class="btn" style="display: none" data-bs-toggle="modal" data-bs-target="#modal-success"></a>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const trigger = document.querySelector('#modalSuccessTrigger');
        trigger.click()
    })
</script>