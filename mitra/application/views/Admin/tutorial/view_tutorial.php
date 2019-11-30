<!doctype html>
<html>
<head>
	<!-- TinyMCE script -->
	<script src='<?= base_url() ?>assets/tinymce/tinymce.min.js'></script>
</head>
<body>
<!-- Form -->
<form method='post' action=''>
	<!-- Textarea -->
	<textarea class='editor' name='content'>
      <?php if(isset($content)){ echo $content; } ?>
      </textarea>
	<br>
	<input type='submit' value='Submit' name='submit'>
</form>

<!-- Script -->
<script>
	tinymce.init({
		selector:'.editor',
		theme: 'modern',
		height: 200
	});
</script>
</body>
</html>
