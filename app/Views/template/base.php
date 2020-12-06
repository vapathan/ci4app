<html>
<head>
    <title><?= $this->renderSection('title'); ?></title>
    <link href="<?=base_url('public/assets/css/bootstrap.min.css');?>" rel="stylesheet"></link>
</head>
<body>
<h1>Header</h1>

<?= $this->renderSection('mainContent'); ?>

<h1>Footer</h1>
<script src="<?=base_url('public/assets/js/bootstrap.min.js');?>"></script>

</body>
</html>