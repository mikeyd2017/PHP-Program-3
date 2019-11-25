<!DOCTYPE html>
<html>
<head>
    <title>Hamilton Road</title>
    <link rel="stylesheet" type="text/css" href="view/main.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <?php include_once('nav.php'); ?>
    <main>
        <h1>All Bags</h1>
        <ul id="user-list">
            <?php
            foreach ($bags as $bag) {
                ?>
                <li class="user">
                    <div id="user-info">
                        <h3><a <?php echo htmlspecialchars ($bag["Title"]); ?></h3>
                        <p><?php echo htmlspecialchars ($bag["Description"]);?> </p>
                        <p><?php echo htmlspecialchars($bag["Price"]);?></p>
                    </div>

                </li>

            <?php } ?>
        </ul>
    </main>
</body>
</html>



