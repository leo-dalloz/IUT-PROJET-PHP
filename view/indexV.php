<?php
	$title = 'Freenote';
	$style = '../assets/css/index.css';
	$style_theme = '../assets/css/theme/day.css';

    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }

	ob_start()
?>

<!-- Contenu index -->

<?php
	$content = ob_get_clean();
	require ('../template.php');
?>
