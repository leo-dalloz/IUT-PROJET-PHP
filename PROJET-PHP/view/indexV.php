<?php
	$title = 'Freenote';
	$style = '../assets/css/index.css';
	$style_theme = '../assets/css/theme/day.css';


	ob_start()
?>

<a href="#" id="ToUpButton">
    <i class="far fa-arrow-alt-circle-up"></i>
</a>

<?php
	$content = ob_get_clean();
	require ('../template.php');
?>
