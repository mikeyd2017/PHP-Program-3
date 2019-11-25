<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hamilton Road</title>
        <link rel="stylesheet" type="text/css" href="view/main.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <?php include_once('nav.php'); ?>
        <main>
            <?php if (isset($message)) { ?>
                <p class="error"><?php echo htmlspecialchars (nl2br($message)) ?></p>
            <?php } ?>
            <h1>Login</h1>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="login" />
                
                <label>Username:</label>
                <input type="text" name="username" value="" />
                <br />
                <label>Password:&nbsp;</label>
                <input type="text" name="password" value="" />
                <br />
                <input type="submit" name="submit" value="Login" />
            </form>
        </main>
    </body>
</html>