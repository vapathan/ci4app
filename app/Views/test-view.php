<?= $this->extend('template/base'); ?>

<?= $this->section('mainContent'); ?>

<div class="container">
    <?= form_open(); ?>
    <div class="form-group">
        <?= form_label('Name'); ?>
        <?= form_input(['type' => 'text', 'value' => set_value('name'), 'name' => 'name', 'class' => 'form-control']); ?>
        <span class="text-danger"><?= isset($validations) ? $validations->getError('name') : '' ?></span>
    </div>
    <div class="form-group">
        <?= form_label('Mobile'); ?>
        <?= form_input(['type' => 'phone', 'value' => set_value('mobile'), 'name' => 'mobile', 'class' => 'form-control']); ?>
        <span class="text-danger"><?= isset($validations) ? $validations->getError('mobile') : '' ?></span>
    </div>
    <div class="form-group">
        <?= form_submit(['value' => 'Save']); ?>
    </div>
    <?= form_close(); ?>
</div>

<?= $this->endSection(); ?>
