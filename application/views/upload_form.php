<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('uploads/index');?>

<input type="file" name="image" size="20" />
<input type="file" name="pdf" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>