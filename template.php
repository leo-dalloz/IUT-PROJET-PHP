<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="icon" type="image/png" href="./assets/images/freenoteWWings.png" />

        <link rel="stylesheet" href="<?= $style ?>">
        <link id="ThemeStylesheet" rel="stylesheet" href="<?= $style_theme ?>">
        <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>

        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <div id="HeaderContainer">
                <a id="LogoHeaderContainer" href="">
                    <img id="LogoHeader" src="../assets/images/test2.png" alt="logo FreeNote">
                </a>

                <nav>
                    <a class="navLink" href="loginV.php">Connexion <i class="fas fa-sign-in-alt"></i></a>
                    <a class="navLink" href="registerV.php">Inscription <i class="fas fa-user-plus"></i></a>
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
            <p>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                    alt="CSS Valide !" />
                </a>
            </p>
        </footer>
    </body>
    <script src="./assets/js/architecture.js"></script>
</html>
