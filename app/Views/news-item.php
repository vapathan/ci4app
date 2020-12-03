<h2><?= esc($title); ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="<?=base_url('news/create');?>" method="post" enctype="multipart/form-data">


    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="body">Text</label>
    <textarea name="body"></textarea><br />
    <input type="file" accept="*/*" name="file-data">
    <input type="submit" name="submit" value="Create news item" />

</form>