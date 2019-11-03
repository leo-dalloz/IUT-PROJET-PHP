<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../assets/css/template.css">
    <link id="ThemeStylesheet" rel="stylesheet" href="../assets/css/theme/night.css">
    <link rel="stylesheet" href="<?= $style ?>">
    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>

    <title><?= $title ?></title>
</head>
<body>
<header>
    <div id="HeaderContainer">
        <a id="LogoHeaderContainer" href="../controller/indexC.php">
            <img id="LogoHeader" src="../assets/images/test2.png" alt="logo FreeNote">
        </a>
        <nav>
            <?php if ('ok' != $is_guest) {?>
                <a class="navLink" href="../controller/loginC.php">Connexion <i class="fas fa-sign-in-alt"></i></a>
                <a class="navLink" href="../controller/registerC.php">Inscription <i class="fas fa-user-plus"></i></a>
            <?php } else { ?>
                <a class="navLink" href="../controller/profileC.php">Profil</a>
                <a class="navLink" href="../controller/deconnectionC.php">Deconnexion <i class="fas fa-sign-out-alt"></i></a>
            <?php } ?>
        </nav>
        <button id="ChangeThemeButton">
            <i id="IconThemeButton" class="fas fa-sun"></i>
        </button>
    </div>
</header>


<?= $content ?>


<footer>
    <section id="FooterContainer">
        <div id="NameContainer">
            <p class="AuthorName">
                <a href="https://github.com/leo-dalloz"><i class="fab fa-github"></i>Léo Dalloz</a>
            </p>
            <p class="AuthorName">
                <a href="https://github.com/jeremy-pouzargues"><i class="fab fa-github"></i> Jérémy Pouzargues</a>
            </p>
            <p class="AuthorName">
                <a href="https://github.com/LucasUrgenti"><i class="fab fa-github"></i> Lucas Urgenti</a>
            </p>
            <p class="AuthorName">
                <a href="https://github.com/laurent-vouriot"><i class="fab fa-github"></i> Laurent Vouriot</a>
            </p>
            <p class="AuthorName">
                <a href="https://github.com/audreywagner"><i class="fab fa-github"></i> Audrey Wagner</a>
            </p>
        </div>
    </section>
</footer>
</body>
<script src="../assets/js/architecture.js"></script>
</html>
