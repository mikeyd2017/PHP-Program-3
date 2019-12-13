
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hamilton Road</title>
        <link rel="stylesheet" type="text/css" href="view/main.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <?php include_once('leftColumn.php'); ?>
        <div class="right-column">
        <main>
            <?php if (isset($message)) { ?>
                <p class="error"><?php echo nl2br($message) ?></p>
            <?php } ?>
            <h1>Login</h1>
            <div class="form-container">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="login" />
                
                <label>Username:</label><br>
                <input type="text" name="username" value="" />
                <br />
                <label>Password:&nbsp;</label><br>
                <input type="password" name="password" value="" />
                <br />
                <input type="submit" name="submit" value="Login" />
            </form>
            </div>
        </main>
        </div>
    </body>
</html>