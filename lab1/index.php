<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Andrii Konovalchuk</title>
</head>

<body>
    <header>
        <h1>OOP PHP</h1>
        <h1>Login and Register forms</h1>
    </header>

    <?php if (!isset($_SESSION['loggedIn'])): ?>

        <main>
            <div class="login-form">
                <h2>Log in</h2>
                <form action="login.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>

                    <?php if (isset($_SESSION['loginError'])): ?>
                        <p style="color: red">
                            <?= $_SESSION['loginError'] ?>
                        </p>
                    <?php endif; ?>

                    <input type="submit" name="login" value="Log in" class="button">
                </form>
            </div>

            <div class="register-form">
                <h2>Register</h2>
                <form action="register.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>

                    <label for="password2">Repeat the password:</label>
                    <input type="password" name="password2" id="password2" required>

                    <?php if (isset($_SESSION['registerError'])): ?>
                        <p style="color: red">
                            <?= $_SESSION['registerError'] ?>
                        </p>
                    <?php endif; ?>

                    <input type="submit" name="register" value="Register" class="button">
                </form>
            </div>
        </main>

    <?php else: ?>

        <main>
            <div class="logout-form">
                <h1>Hello,
                    <?= htmlspecialchars($_SESSION['username']) ?>!
                </h1>
                <form action="logout.php" method="POST">
                    <input type="submit" name="logout" value="logout" class="button">
                </form>
            </div>
        </main>

    <?php endif; ?>
</body>

</html>

<?php
unset($_SESSION['registerError']);
unset($_SESSION['loginError']);
?>