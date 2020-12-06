<?= $this->extend('template/base'); ?>
<?= $this->section('mainContent'); ?>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['name']?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <?=$pager->links();?>
</div>
<?= $this->endSection(); ?>
