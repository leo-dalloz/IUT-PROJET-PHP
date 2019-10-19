<?php
	$title = 'Freenote';
	$style = '../assets/css/index.css';
	$style_theme = '../assets/css/theme/day.css';


	ob_start()
?>

<!-- Contenu index -->

<?php
	$content = ob_get_clean();
	require ('../template.php');
?>
