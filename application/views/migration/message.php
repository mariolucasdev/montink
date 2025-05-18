<style>
    pre {
        padding: 1rem;
        background: #182433 ;
        color: #fff;
        border-radius: 5px;
    }
</style>

<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title"> <?= $table ?> </h2>
                </div>
            </div>
        </div>
    </div>

    <?php if(empty($error)): ?>
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <h4>Instrução executada:</h4>
                    <div>
                        <pre><code><?= $last_query ?></code></pre>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <h4>Erro na table <strong> <?= $table ?> </strong>!</h4>
                    <div>
                        <pre><code><?= $error['message'] ?></pre>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>