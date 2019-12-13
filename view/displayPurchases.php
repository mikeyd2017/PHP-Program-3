
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
            <h1>All Purchases</h1>
            
            <div class="purchase-container">
                <?php foreach($purchases as $purchase) { ?>
                <div class="purchase">
                <span class="purchase-id">Purchase ID:&nbsp;<?php echo htmlspecialchars($purchase["PurchaseID"]);?></span>
                <span class="purchase-total">Total:&nbsp;<?php echo htmlspecialchars($purchase["Total"]);?></span>
                <span class="purchase-date">Date:&nbsp;<?php echo htmlspecialchars($purchase["Date"]);?></span>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>