<header>
    <nav class="navbar navbar-dark bg-dark" id="nav-header">
        <div class="nav-content">
            <a class="navbar-brand" href="home.php"><div style="width: 0.5em"></div><h1>CinéList</h1></a>
            <a class="navbar-brand" href="home.php">Séries</a>
            
            <div style="flex: 1">
        <?php
        if(!isset($_SESSION['nick'])) : ?>
        <div id="log-button"></div>
            <a href="login.php">
                <button class="btn btn-secondary">
                    LOGIN
                </button>
            </a>
        </div>
        <?php elseif (isset($_SESSION['nick'])): ?>   
            <div id="session">
                <div id="session-name">
                    session: <?= $_SESSION['nick']?>
                </div>
                <a href="logout.php">
                    <button class="btn btn-secondary">
                        LOGOUT
                    </button>
                </a>
            </div>
    <?php endif; ?>
            </div>
        </div>
    </nav>
</header>