<?php
?>
<header>
    <div id="log-button">
        <?php if(isset($response) and isset($response['nick'])) : ?>
            <a href="index.php">
                <button class="btn-secondary">
                    LOGOUT
                </button>
            </a>
        <?php endif; ?>
    </div>
</header>