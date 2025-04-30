<?php
?>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="nav-content">
            <a class="navbar-brand" href="<?php echo $GLOBALS['PAGES_DIR'] ?>home.php">
                <div style="width: 0.5em"></div>
                <h1>CinéList</h1>
            </a>
            <a class="navbar-brand" href="<?php echo $GLOBALS['PAGES_DIR'] ?>home.php">
                Séries
            </a>
            
            <div style="flex: 1">
            <div id="log-button">
        <?php if(isset($response) and isset($response['nick'])) : ?>
            <a class="navbar-brand" href="<?php echo $GLOBALS['PAGES_DIR'] ?>adminPanel.php">
                Admin Panel
            </a>
            <div id="session-name">
                session: <?= $response['nick']?>
            </div>

            <a href="index.php">
                <button class="btn btn-secondary">
                    LOGOUT
                </button>
            </a>
        <?php endif; ?>
    </div>
            </div>
        </div>
    </nav>
</header>