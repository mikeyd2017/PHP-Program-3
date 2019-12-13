<?php 	 	
    if (!isset($firstName)) { $firstName = ''; } 
    if (!isset($lastName)) { $lastName = ''; } 
    if (!isset($userName)) { $userName = ''; } 
    if (!isset($password)) { $password = ''; }
    if (!isset($email)) { $email = ''; }   
?> 
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
            <h1>Create User</h1>
            <div class="form-container">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="create_user"/>
                
                <label>Username:</label>
                <input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>" />
                <br />
                <label>First Name:&nbsp;</label>
                <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" />
                <br />
                <label>Last Name:&nbsp;</label>
                <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" />
                <br />
                <label>Email:&nbsp;</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                <br />
                <label>Password&nbsp;</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>" />
                <br />
                <input type="submit" name="submit" value="Create User" />
            </form>
            </div>
        </main>
        </div>
    </body>
</html>