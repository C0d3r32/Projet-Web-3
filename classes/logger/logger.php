<?php
namespace logger;

class Logger
{
    public function generateLoginForm(string $action = ""): void {
        ?>
        <form method="post" action="<?= htmlspecialchars($action) ?>" class="magic-card" id="login-form">
            <legend style="text-align: center;">Please Login</legend>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
        <?php
    }

    public function log(string $username, string $password): array {
        $user = "admin";
        $pwd = "admin";

        $error = null;
        $nick = null;
        $granted = false;

        if (empty($username)) {
            $error = "Username is empty.";
        } elseif (empty($password)) {
            $error = "Password is empty.";
        } elseif ($user === $username && $pwd === $password) {
            $granted = true;
            $nick = htmlspecialchars("admin");
        } else {
            $error = "Authentication Failed.";
        }

        return [
            'granted' => $granted,
            'nick' => $nick,
            'error' => $error
        ];
    }
}
