<?php
$total = 0;

foreach ($lineItems as $lineItem) {
    $total += $lineItem["Price"];
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="left-column">
            <?php include_once('nav.php'); ?>
            <?php if(isset($user)) : ?>
            <p class="username"><?php echo htmlspecialchars ($user["UserName"]); ?></p>

            


            <div class="cart-container">
                    <?php if (count($lineItems) > 0) : ?>
                    <?php foreach ($lineItems as $lineItem) { ?>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_lineitem">
                    <input type="hidden" name="lineItemID" value=<?php echo htmlspecialchars ($lineItem["LineItemID"]); ?>>
                    <ul class="lineItem">
                    <li>
                        <?php echo htmlspecialchars ($lineItem["BagTitle"]); ?>
                    </li>
                    <li>
                        <span>Quantity: x</span><?php echo htmlspecialchars ($lineItem["Quantity"]); ?>
                    </li>
                    <li>
                        <span>Price: $</span><?php echo htmlspecialchars ($lineItem["Price"]); ?>
                    </li>
                    <input class="checkout-button" type="submit" value="Remove Item">
                    </ul>
                </form>
                    <?php } endif;?>

            </div>
            <form action="." method="post">
            <input type="hidden" name="action" value="checkout_items">
            <input type="hidden" name="cartTotal" value=<?php echo $total?>>
            <?php if (count($lineItems) > 0) : ?>
            <input class="checkout-button" type="submit" value="Check Out">
            <?php else : ?>
            <span class="additemtocart">Add an item to the cart for checkout!</span>
            <?php endif;?>
            </form>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_all_lineitems">
                <input type="hidden" name="username" value=<?php echo htmlspecialchars ($user["UserName"]); ?>>
                <input class="checkout-button" type="submit" value="Remove Items From Bag">
            </form>
            <span class="cart-total">Total: $<?php echo htmlspecialchars ($total);?></span>

            <?php endif; ?>
        </div>
    </body>
</html>
