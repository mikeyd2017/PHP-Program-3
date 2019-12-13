
<!DOCTYPE html>
<html>
<head>
    <title>Hamilton Road</title>
    <link rel="stylesheet" type="text/css" href="view/main.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <main>

        <?php include_once('leftColumn.php'); ?>
        <div class="right-column">
            <h1>All Bags</h1>
            <div class="bag-container">
            <?php
            foreach ($bags as $bag) {
                ?>
            <div class="bag">
                <form action="." method="post">
                <input type="hidden" name="action" value="add_bag_to_cart">
                <input type="hidden" name="bagTitle" value=<?php echo $bag["Title"]; ?>>
                        <h3 class="bag-title"><?php echo htmlspecialchars ($bag["Title"]); ?></h3>
                        <img src="<?php echo htmlspecialchars ($bag['FileName']) ?>" alt="bag picture" height="100" width="100" class="bag-picture">
                        <p class="bag-description"><?php echo htmlspecialchars ($bag["Description"]);?> </p>
                        <p class="bag-price">$<?php echo htmlspecialchars($bag["Price"]);?></p>
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
                        <?php if(isset($user)) : ?>
                        <input class="bag-button" type="submit" value="Add To Cart">
                        <?php elseif(!isset($user)) : ?>
                        <span class="cart-login">Log In For Cart</span>
                        <?php endif ?>



            </form>
            </div>
            <?php } ?>

        </div>
        </div>
    </main>
</body>
</html>



