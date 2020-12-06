<?= $this->extend('template/base'); ?>
<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('mainContent'); ?>
<div class="container">
    <h2>Contact Us</h2>

    <?= form_open_multipart('/contact'); ?>
    <?php if(isset($validator)):?>
    <?= $validator->listErrors();?>
    <?php endif;?>
    <?= csrf_field()?>
    <div class="form-group">
        <?= form_label('Email'); ?>
        <?= form_input(['type' => 'email', 'class' => 'form-control', 'name' => 'email']); ?>
    </div>
    <div class="form-group">
        <label for="">Name</label>
        <?= form_input(['type' => 'text', 'class' => 'form-control', 'name' => 'name']); ?>
    </div>
    <div class="form-group">
        <label for="">Message</label>
        <?= form_textarea(['name' => 'message', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?=form_label('Choose Photo');?>

    </div>

    <?= form_submit(['value' => 'Send']); ?>
    <?=form_close();?>

</div>
<?= $this->endSection(''); ?>
