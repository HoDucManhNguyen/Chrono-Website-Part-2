<?php
// if (!isset($_SERVER['HTTP_REFERER'])) {
//     header("location: index.php");
//     exit;
// }
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your Receipt">
    <meta name="keywords" content="HTML5">
    <meta name="author" content="Le Minh Bani-Hashemi">
    <link href="styles/receipt.css" rel="stylesheet">
    <link href="styles/header.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <title>Receipt</title>
</head>

<body id="barney_receipt">

    <!-- The header section starts -->
	
    <?php
    include("header.inc");
    ?>

    <!-- The header section ends -->

    <!-- The container section starts -->

    <section id="barney_receipt_container">
        <div id="Introduction">
            <h2> RECEIPT PAGE </h2>
            <p> Your order is on the way shortly </p>
            <p> Order confirmation will be sent through email </p>
        </div>

        <div id="red_line"></div>

        <section id="barney_receipt_information">
            <dl>
                <dt> Personal Information </dt>
                <dd><span class="term">Name</span> <?= $_SESSION['first_name']; ?> </dd>
                <dd><span class="term">Email</span> <?= $_SESSION['email']; ?> </dd>
                <dd><span class="term">Phone Number</span> <?= $_SESSION['phone_number']; ?> </dd>
            </dl>

            <dl>
                <dt> Shipping Information </dt>
                <dd><span class="term">Address</span> <?= $_SESSION['street_addr']; ?> </dd>
                <dd><span class="term">City</span> <?= $_SESSION['city']; ?> </dd>
                <dd><span class="term">State</span> <?= $_SESSION['customer_state']; ?> </dd>
                <dd><span class="term">Postcode</span> <?= $_SESSION['postcode']; ?> </dd>
            </dl>

            <dl>
                <dt> Product </dt>
                <dd><span class="term">Watch</span> <?= $_SESSION['order_product']; ?> </span></dd>
                <dd><span class="term">Quantity</span> <?= $_SESSION['order_quantity']; ?> </dd>
            </dl>

            <dl>
                <dt> Order </dt>
                <dd><span class="term">Order ID</span> <?= $_SESSION['order_id']; ?> </dd>
                <dd><span class="term">Order Status</span> <?= $_SESSION['order_status']; ?> </dd>
                <dd><span class="term">Order Date</span> <?= $_SESSION['order_time']; ?> </dd>
                <dd><span class="term">Order Cost</span> <?= $_SESSION['order_cost']; ?> </dd>
                <dd><span class="term">Card Name</span> <?= $_SESSION['card_name']; ?> </dd>
                <dd><span class="term">Card Type</span> <?= $_SESSION['card_type']; ?> </dd>
                <dd><span class="term">Card Number</span> <?= $_SESSION['card_number']; ?> </dd>
            </dl>

        </section>

        <div id="after_container">
            <a class="button_type" type="submit" value="book" href="index.php">BACK TO HOMEPAGE</a>
            <a class="button_type" type="submit" value="book" href="payment.php">CONTINUE SHOPPING</a>
        </div>

        <!-- The container section starts -->

        <!--The footer section starts-->

        <?php
        include("footer.inc");
        ?>

        <!--The footer section ends-->
    </section>

</body>

</html>