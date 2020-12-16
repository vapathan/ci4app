<?= form_open('Redirection/index'); ?>
<?= form_label('Enter first number'); ?>
<?= form_input(['type' => 'text', 'name' => 'n1']); ?>
<span><?= isset($validations['n1']) ? $validations['n1'] : '' ?></span><br><br>
<?= form_label('Enter second number'); ?>
<?= form_input(['type' => 'text', 'name' => 'n2']); ?>
<span><?= isset($validations['n2']) ? $validations['n2'] : '' ?></span><br><br>
<?= form_submit(['value' => 'Add']); ?>
<?= form_close(); ?>

<?php if (isset($sum)): ?>
    <h2>Result : <?= $sum ?></h2>
<?php endif; ?>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (isset($_SESSION['newData'])) {
        $students = $_SESSION['newData'];//*
        
    }
    ?>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td>
                <?= form_open('Redirection/edit') ?>
                <?= form_hidden('id', $student['id']) ?>
                <?= form_submit(['value' => 'Edit']) ?>
                <?= form_close() ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
if (isset($_SESSION['test'])):?>
    <?php print_r($_SESSION['test']); ?>
<?php endif; ?>
