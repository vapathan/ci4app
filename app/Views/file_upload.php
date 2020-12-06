<html>
<head>
    <title>File Uploading</title>
</head>
<body>
<?php if(isset($validation)):?>
<?= $validation->listErrors();?>
<?php endif;?>
<?= form_open_multipart('Page/uploadFile');?>
Upload Image : <input type="file" name="photo">
<input type="submit" value="Upload">
<?=form_close();?>
</body>
</html>