<header>
    <nav class="navbar navbar-dark" id="nav-header">
        <div class="nav-content" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 20px;">
            <a class="navbar-brand" href="home.php"><div style="width: 0.5em"></div><h1>CinéList</h1></a>
            <ul>
                <li><a href="home.php">Accueil</a></li>
                <li><a href="home.php">Séries</a></li>
                <li><a href="acteurs.php">Acteurs</a></li>
                <li><a href="realisateurs.php">Réalisateurs</a></li>
            </ul>
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            switch ($currentPage) {
                case 'home.php':
                    $placeholderText = "Rechercher une série...";
                    break;
                case 'acteurs.php':
                    $placeholderText = "Rechercher un acteur...";
                    break;
                case 'realisateurs.php':
                    $placeholderText = 'Rechercher un réalisateur...';
                    break;
                default:
                    $placeholderText = "Rechercher...";
                    break;
            }
            ?>
            <input type="text" id="searchInput" placeholder="<?= htmlspecialchars($placeholderText) ?>">
        </div>

        <div id="auth-buttons" style="display: flex; align-items: center; gap: 15px;">
            <?php if(!isset($_SESSION['nick'])) : ?>
                <a href="login.php">
                    <button class="btn btn-secondary">LOGIN</button>
                </a>
            <?php else: ?>
                <div id="session" style="display: flex; align-items: center; gap: 10px;">
                    <div id="session-name">session: <?= htmlspecialchars($_SESSION['nick']) ?></div>
                    <a href="logout.php">
                        <button class="btn btn-secondary">LOGOUT</button>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>