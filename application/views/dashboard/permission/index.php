<div>
    <label class="form-check form-check-inline">
        <input
            class="form-check-input"
            name="dashboard[index]"
            <?= !$permissions['dashboard']['index'] ?: 'checked' ?>
            value="true"
            type="checkbox">
        <span class="form-check-label">Módulo</span>
    </label>
    <label class="form-check form-check-inline">
        <input
            class="form-check-input"
            name="dashboard[manager]"
            <?= !$permissions['dashboard']['manager'] ?: 'checked' ?>
            value="true"
            type="checkbox">
        <span class="form-check-label">Gestão</span>
    </label>
</div>