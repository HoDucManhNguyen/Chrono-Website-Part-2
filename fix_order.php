<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enquiry page">
    <meta name="keywords" content="HTML5/CSS/PHP">
    <meta name="author" content="Duy Khang Nguyen">
    <title>Payment page</title>

    <link href="styles/enquire.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <!--The header section starts-->
    <?php
    include("header.inc");
    ?>
    <!--The header section ends-->

    <?php
        // Display the red error block if there is an error
        if ($_SESSION['error_first_name'] != null) {
            ?> <style>.error_first_name{display: block}</style> <?php
        }
        if ($_SESSION['error_last_name'] != null) {
            ?> <style>.error_last_name{display: block}</style> <?php
        }
        if ($_SESSION['error_email'] != null) {
            ?> <style>.error_email{display: block}</style> <?php
        }
        if ($_SESSION['error_phone_number'] != null) {
            ?> <style>.error_phone_number{display: block}</style> <?php
        }
        if ($_SESSION['error_street_addr'] != null) {
            ?> <style>.error_street_addr{display: block}</style> <?php
        }
        if ($_SESSION['error_city'] != null) {
            ?> <style>.error_city{display: block}</style> <?php
        }
        if ($_SESSION['error_customer_state'] != null) {
            ?> <style>.error_customer_state{display: block}</style> <?php
        }
        if ($_SESSION['error_postcode'] != null) {
            ?> <style>.error_postcode{display: block}</style> <?php
        }
        if ($_SESSION['error_order_product'] != null) {
            ?> <style>.error_order_product{display: block}</style> <?php
        }
        if ($_SESSION['error_order_quantity'] != null) {
            ?> <style>.error_order_quantity{display: block}</style> <?php
        }
        if ($_SESSION['error_card_type'] != null) {
            ?> <style>.error_card_type{display: block}</style> <?php
        }
        if ($_SESSION['error_card_name'] != null) {
            ?> <style>.error_card_name{display: block}</style> <?php
        }
        if ($_SESSION['error_card_number'] != null) {
            ?> <style>.error_card_number{display: block}</style> <?php
        }
        if ($_SESSION['error_card_expire'] != null) {
            ?> <style>.error_card_expire{display: block}</style> <?php
        }
        if ($_SESSION['error_card_cvv'] != null) {
            ?> <style>.error_card_cvv{display: block}</style> <?php
        }
    ?>

    <!--The form heading section starts-->
    <section id="enquire_intro">
        <h1>ORDER PAGE</h1>
        <div id="enquiry_text">
            <p>Time is valuable. We strive to bring best quality pieces for you to tell time.
                We are happy to answer any questions you may have about our products.</p>
        </div>
        <div id="red_line"></div>
    </section>
    <!--The form heading section ends-->

    <!--The form section starts-->
    <!-- <form novalidate method="post" action="https://mercury.swin.edu.au/it000000/formtest.php"> -->
    <form novalidate method="post" action="process_order.php">
        <fieldset>
            <legend>PERSONAL INFORMATION</legend>
            <div class="form_line">
                <div class="form_box">
                    <label for="title" class="main_label">TITLE</label>
                    <select required id="title" name="title">
                        <option value="Mr." <?php if ($_SESSION['title'] == 'Mr.') echo ' selected="selected"'; ?>>Mr.</option>
                        <option value="Ms." <?php if ($_SESSION['title'] == 'Ms.') echo ' selected="selected"'; ?>>Ms.</option>
                        <option value="Mrs." <?php if ($_SESSION['title'] == 'Mrs.') echo ' selected="selected"'; ?>>Mrs.</option>
                    </select>
                </div>
            </div>

            <div class="form_line">
                <div class="form_box">
                    <label for="first_name" class="main_label">FIRST NAME</label>
                    <input required id="first_name" name="first_name" type="text" pattern="[A-Za-z]{1,25}" title="maximum 25 alphabetical characters" value="<?php echo $_SESSION['first_name'] ?>">
                    <p class="error error_first_name"><?php echo $_SESSION['error_first_name'] ?></p>
                </div>
                <div class="form_box">
                    <label for="last_name" class="main_label">LAST NAME</label>
                    <input required id="last_name" name="last_name" type="text" pattern="[A-Za-z]{1,25}" title="maximum 25 alphabetical characters" value="<?php echo $_SESSION['last_name'] ?>">
                    <p class="error error_last_name"><?php echo $_SESSION['error_last_name'] ?></p>
                </div>
            </div>

            <div class="form_line">
                <div class="form_box">
                    <label for="email" class="main_label">EMAIL ADDRESS</label>
                    <input required id="email" name="email" type="email" value="<?php echo $_SESSION['email'] ?>">
                    <p class="error error_email"><?php echo $_SESSION['error_email'] ?></p>
                </div>
                <div class="form_box">
                    <label for="phone_number" class="main_label">PHONE NUMBER</label>
                    <input required id="phone_number" name="phone_number" type="text" pattern="\d{1,10}]" title="maximum 10 digits" placeholder="038 748 2345" value="<?php echo $_SESSION['phone_number'] ?>">
                    <p class="error error_phone_number"><?php echo $_SESSION['error_phone_number'] ?></p>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>ADDRESS INFORMATION</legend>
            <div class="form_line">
                <div class="form_box">
                    <label for="street_addr" class="main_label">STREET ADDRESS</label>
                    <input required id="street_addr" name="street_addr" type="text" pattern=".{1,40}" title="maximum 40 characters" value="<?php echo $_SESSION['street_addr'] ?>">
                    <p class="error error_street_addr"><?php echo $_SESSION['error_street_addr'] ?></p>
                </div>
                <div class="form_box">
                    <label for="city" class="main_label">CITY</label>
                    <input required id="city" name="city" type="text" pattern=".{1,20}" title="maximum 20 characters" value="<?php echo $_SESSION['city'] ?>">
                    <p class="error error_city"><?php echo $_SESSION['error_city'] ?></p>
                </div>
            </div>

            <div class="form_line">
                <div class="form_box">
                    <label for="customer_state" class="main_label">STATE</label>
                    <select required id="customer_state" name="customer_state">
                        <!-- disabled so that 'Please select' cannot be choose if select another option -->
                        <option value="default" selected>Please select</option>
                        <option value="alabama" <?php if ($_SESSION['customer_state'] == 'alabama') echo ' selected="selected"'; ?>>Alabama</option>
                        <option value="alaska" <?php if ($_SESSION['customer_state'] == 'alaska') echo ' selected="selected"'; ?>>Alaska</option>
                        <option value="california" <?php if ($_SESSION['customer_state'] == 'california') echo ' selected="selected"'; ?>>California</option>
                        <option value="florida" <?php if ($_SESSION['customer_state'] == 'florida') echo ' selected="selected"'; ?>>Florida</option>
                        <option value="hawaii" <?php if ($_SESSION['customer_state'] == 'hawaii') echo ' selected="selected"'; ?>>Hawaii</option>
                        <option value="illinois" <?php if ($_SESSION['customer_state'] == 'illinois') echo ' selected="selected"'; ?>>Illinios</option>
                        <option value="newyork" <?php if ($_SESSION['customer_state'] == 'newyork') echo ' selected="selected"'; ?>>New York</option>
                    </select>
                    <p class="error error_customer_state"><?php echo $_SESSION['error_customer_state'] ?></p>
                </div>
                <div class="form_box">
                    <label for="postcode" class="main_label">POSTCODE</label>
                    <input required id="postcode" name="postcode" type="text" pattern="\d{4}" title="exactly 4 digits" value="<?php echo $_SESSION['postcode'] ?>">
                    <p class="error error_postcode"><?php echo $_SESSION['error_postcode'] ?></p>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>PRODUCT</legend>
            <div class="form_line">
                <div class="form_box">
                    <label for="order_product" class="main_label">PRODUCT</label>
                    <select required id="order_product" name="order_product">
                        <option value="default" selected>Please select</option>
                        <option value="novelties" <?php if ($_SESSION['order_product'] == 'novelties') echo ' selected="selected"'; ?>>Novelties, $45,000</option>
                        <option value="apex" <?php if ($_SESSION['order_product'] == 'apex') echo ' selected="selected"'; ?>>Apex, $50,000</option>
                        <option value="zenith" <?php if ($_SESSION['order_product'] == 'zenith') echo ' selected="selected"'; ?>>Zenith, $47,000</option>
                        <option value="radiance" <?php if ($_SESSION['order_product'] == 'radiance') echo ' selected="selected"'; ?>>Radiance, $49,000</option>
                        <option value="empyrean" <?php if ($_SESSION['order_product'] == 'empyrean') echo ' selected="selected"'; ?>>Empyrean, $58,000</option>
                        <option value="horizon" <?php if ($_SESSION['order_product'] == 'horizon') echo ' selected="selected"'; ?>>Horizon, $55,000</option>
                        <option value="luminary" <?php if ($_SESSION['order_product'] == 'luminary') echo ' selected="selected"'; ?>>Luminary, $46,000</option>
                        <option value="odyssey" <?php if ($_SESSION['order_product'] == 'odyssey') echo ' selected="selected"'; ?>>Odyssey, $51,000</option>
                    </select>
                    <p class="error error_order_product"><?php echo $_SESSION['error_order_product'] ?></p>
                </div>
                <div class="form_box">
                    <label for="order_quantity" class="main_label">QUANTITY</label>
                    <input required id="order_quantity" name="order_quantity" type="text" pattern="" value="<?php echo $_SESSION['order_quantity'] ?>">
                    <p class="error error_order_quantity"><?php echo $_SESSION['error_order_quantity'] ?></p>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>PAYMENT</legend>
            <div class="form_line">
                <div class="form_box">
                    <label for="card_type" class="main_label">CARD TYPE</label>
                    <select required id="card_type" name="card_type">
                        <option value="default" selected>Please select</option>
                        <option value="Visa" <?php if ($_SESSION['card_type'] == 'Visa') echo ' selected="selected"'; ?>>Visa</option>
                        <option value="Master" <?php if ($_SESSION['card_type'] == 'Master') echo ' selected="selected"'; ?>>Mastercard</option>
                        <option value="AE" <?php if ($_SESSION['card_type'] == 'AE') echo ' selected="selected"'; ?>>American Express</option>
                    </select>
                    <p class="error error_card_type"><?php echo $_SESSION['error_card_type'] ?></p>
                </div>
            </div>
            <div class="form_line">
                <div class="form_box">
                    <label for="card_name" class="main_label">CARDHOLDER NAME</label>
                    <input required id="card_name" name="card_name" type="text" pattern="" value="<?php echo $_SESSION['card_name'] ?>">
                    <p class="error error_card_name"><?php echo $_SESSION['error_card_name'] ?></p>
                </div>
                <div class="form_box">
                    <label for="card_number" class="main_label">CARD NUMBER</label>
                    <input required id="card_number" name="card_number" type="text" pattern="" value="<?php echo $_SESSION['card_number'] ?>">
                    <p class="error error_card_number"><?php echo $_SESSION['error_card_number'] ?></p>
                </div>
            </div>
            <div class="form_line">
                <div class="form_box">
                    <label for="card_expire" class="main_label">CARD EXPIRY DATE</label>
                    <input required id="card_expire" name="card_expire" type="text" pattern="" value="<?php echo $_SESSION['card_expire'] ?>">
                    <p class="error error_card_expire"><?php echo $_SESSION['error_card_expire'] ?></p>
                </div>
                <div class="form_box">
                    <label for="card_cvv" class="main_label">CVV CODE</label>
                    <input required id="card_cvv" name="card_cvv" type="text" pattern="" value="<?php echo $_SESSION['card_cvv'] ?>">
                    <p class="error error_card_cvv"><?php echo $_SESSION['error_card_cvv'] ?></p>
                </div>
            </div>
        </fieldset>

        <div id="button_container">
            <button class="form_button" type="submit">CHECK OUT</button>
        </div>

    </form>
    <!--The form section ends-->

    <!--The footer section starts-->
    <?php
    include("footer.inc");
    ?>
    <!--The footer section ends-->
</body>

</html>