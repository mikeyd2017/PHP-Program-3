<?php 	 	
    if (!isset($title)) { $title = ''; } 
    if (!isset($description)) { $description = ''; } 
    if (!isset($price)) { $price = ''; }   
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
            <h1>Create Bag</h1>
            <div class="form-container">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="create_bag" />
                
                <label>Title:</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" />
                <br />
                <label>Description:&nbsp;</label>
                <input type="text" name="description" value="<?php echo htmlspecialchars($description); ?>" />
                <br />
                <label>Price:&nbsp;</label>
                <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" />
                <br />
                
                <br />
                <input type="submit" name="submit" value="Create Bag" />
            </form>
            </div
        </main>
        </div>
    </body>
</html>
