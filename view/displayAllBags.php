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
            <form action="." method="post">
                <input type="hidden" name="action" value="add_bag_to_cart">
                <input type="hidden" name="bagTitle" value=<?php echo $bag["Title"]; ?>>
                <li class="bag-container">
                    <div class="bag">
                        <h3 class="bag-title"><?php echo htmlspecialchars ($bag["Title"]); ?></h3>
                        <img src="<?php echo htmlspecialchars ($bag['FileName']) ?>" alt="bag picture" height="100" width="100" class="bag-picture">
                        <p class="bag-description"><?php echo htmlspecialchars ($bag["Description"]);?> </p>
                        <p class="bag-price"><?php echo htmlspecialchars($bag["Price"]);?></p>
                        <input class="bag-button" type="submit" value="Add To Cart">
                        <div class="bag-quantity">
                        <label>Quantity:</label>
                            <select name="itemqty">
                                <?php for($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                </li>
            </form>

            <?php } ?>
        </ul>
    </main>
</body>
</html>



