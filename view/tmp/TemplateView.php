<!-- page template -->

<!-- 
    TODO session_start() pour la navbar
 -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./assets/css/Template.css">
    <link id="ThemeStylesheet" rel="stylesheet" href="./assets/css/themes/Night.css">
    
    <!-- Custom page css link -->
    <link rel="stylesheet" href="./assets/css/<? $css_link ?>.css">

    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>

    <title><?= $page_title ?> | FreeNote</title>
</head>
<body>
    <header>
        <div id="HeaderContainer">
            <a id="LogoHeaderContainer" href="">
                <img id="LogoHeader" src="./assets/images/logo.png" alt="logo FreeNote">
            </a>

            <nav>
                <?php if ($is_guest) {?>
                
                    <a class="navLink" href="">Connexion <i class="fas fa-sign-in-alt"></i></a>
                    <a class="navLink" href="">Inscription <i class="fas fa-user-plus"></i></a>
                
                <?php } else { ?>
                    
                    <a class="navLink" href="">Profil 
                        <div id="ProfilImage"></div>
                    </a>
                    <a class="navLink" href="">Deconnexion <i class="fas fa-sign-out-alt"></i></a>
                
                <?php } ?> 

                <button id="ChangeThemeButton">
                    <i id="IconThemeButton" class="fas fa-sun"></i>
                </button>
            </nav>
        </div>
    </header>

    <main>
        <?= $content ?>
    </main>
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
        
    <?php if (isset($link_js)) { ?>
        <script src="./assets.js/<?= $link_js ?>"></script>
    <?php } ?>
    <script src="./assets/js/architecture.js"></script>
</body>
</html>