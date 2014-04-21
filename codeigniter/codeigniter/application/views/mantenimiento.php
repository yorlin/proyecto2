<!DOCTYPE html>
<html>
<head>
	<title>Activos UTN</title>
	<?php foreach ($JS_CSS_files as $u):?>
				<?php print $u; ?>
	<?php endforeach;?>

</head>
<body>
	<?php print $navbar; ?>
	<div class="container">
		<?php print $table; ?>
	</div>
		
	

	<?php print $modal; ?>

</body>
</html>
