<nav>
    <ul>
        <li>
            <a href="?action=home"><img src="public/media/img/NASA_logo.png" alt="Logo_NASA"></a>
        </li>
        <li>
            <span><i class="fal fa-home"></i></span>
            <a href="?action=home">Accueil</a>
        </li>
        <li>
            <span><i class="fal fa-newspaper"></i></span>
            <a href="?action=post">Articles</a>
        </li>
        <?php if (!isset($_SESSION["user"])) : ?>
            <li>
                <span><i class="far fa-user-plus"></i></span>
                <a href="?action=inscription">Inscription</a>
            </li>
            <li>
                <span><i class="far fa-sign-in"></i></span>
                <a href="?action=connexion">Connexion</a>
            </li>
        <?php else : ?>
            <li>
                <span><i class="fal fa-portrait"></i></span>
                <a href="?action=profil">Profil</a>
            </li>
            <li>
                <span><i class="far fa-envelope"></i></span>
                <a href="?action=messagerie">Messagerie</a>
            </li>
            <li>
                <span><i class="far fa-cogs"></i></span>
                <a href="?action=setting">Setting</a>
            </li>
            <li>
                <span><i class="far fa-sign-out"></i></span>
                <a href="?action=deconnexion">Deconnexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>