<?php
    session_start();
    $_SESSION['error_first_name'] = null;
    $_SESSION['error_last_name'] = null;
    $_SESSION['error_email'] = null;
    $_SESSION['error_phone_number'] = null;
    $_SESSION['error_street_addr'] = null;
    $_SESSION['error_city'] = null;
    $_SESSION['error_customer_state'] = null;
    $_SESSION['error_postcode'] = null;
    $_SESSION['error_order_product'] = null;
    $_SESSION['error_order_quantity'] = null;
    $_SESSION['error_card_type'] = null;
    $_SESSION['error_card_name'] = null;
    $_SESSION['error_card_number'] = null;
    $_SESSION['error_card_expire'] = null;
    $_SESSION['error_card_cvv'] = null;
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
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                    </select>
                </div>
            </div>

            <div class="form_line">
                <div class="form_box">
                    <label for="first_name" class="main_label">FIRST NAME</label>
                    <input required id="first_name" name="first_name" type="text" pattern="[A-Za-z]{1,25}" title="maximum 25 alphabetical characters">
                </div>
                <div class="form_box">
                    <label for="last_name" class="main_label">LAST NAME</label>
                    <input required id="last_name" name="last_name" type="text" pattern="[A-Za-z]{1,25}" title="maximum 25 alphabetical characters">
                </div>
            </div>

            <div class="form_line">
                <div class="form_box">
                    <label for="email" class="main_label">EMAIL ADDRESS</label>
                    <input required id="email" name="email" type="email">
                </div>
                <div class="form_box">
                    <label for="phone_number" class="main_label">PHONE NUMBER</label>
                    <input required id="phone_number" name="phone_number" type="text" pattern="\d{1,10}]" title="maximum 10 digits" placeholder="038 748 2345">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>ADDRESS INFORMATION</legend>
            <div class="form_line">
                <div class="form_box">
                    <label for="street_addr" class="main_label">STREET ADDRESS</label>
                    <input required id="street_addr" name="street_addr" type="text" pattern=".{1,40}" title="maximum 40 characters">
                </div>
                <div class="form_box">
                    <label for="city" class="main_label">CITY</label>
                    <input required id="city" name="city" type="text" pattern=".{1,20}" title="maximum 20 characters">
                </div>
            </div>

            <div class="form_line">
                <div class="form_box">
                    <label for="customer_state" class="main_label">STATE</label>
                    <select required id="customer_state" name="customer_state">
                        <!-- disabled so that 'Please select' cannot be choose if select another option -->
                        <option value="default" selected>Please select</option>
                        <option value="alabama">Alabama</option>
                        <option value="alaska">Alaska</option>
                        <option value="california">California</option>
                        <option value="florida">Florida</option>
                        <option value="hawaii">Hawaii</option>
                        <option value="illinois">Illinios</option>
                        <option value="newyork">New York</option>
                    </select>
                </div>
                <div class="form_box">
                    <label for="postcode" class="main_label">POSTCODE</label>
                    <input required id="postcode" name="postcode" type="text" pattern="\d{4}" title="exactly 4 digits">
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
                        <option value="novelties">Novelties, $45,000</option>
                        <option value="apex">Apex, $50,000</option>
                        <option value="zenith">Zenith, $47,000</option>
                        <option value="radiance">Radiance, $49,000</option>
                        <option value="empyrean">Empyrean, $58,000</option>
                        <option value="horizon">Horizon, $55,000</option>
                        <option value="luminary">Luminary, $46,000</option>
                        <option value="odyssey">Odyssey, $51,000</option>
                    </select>
                </div>
                <div class="form_box">
                    <label for="order_quantity" class="main_label">QUANTITY</label>
                    <input required id="order_quantity" name="order_quantity" type="text" pattern="">
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
                        <option value="Visa">Visa</option>
                        <option value="Master">Mastercard</option>
                        <option value="AE">American Express</option>
                    </select>
                </div>
            </div>
            <div class="form_line">
                <div class="form_box">
                    <label for="card_name" class="main_label">CARDHOLDER NAME</label>
                    <input required id="card_name" name="card_name" type="text" pattern="">
                </div>
                <div class="form_box">
                    <label for="card_number" class="main_label">CARD NUMBER</label>
                    <input required id="card_number" name="card_number" type="text" pattern="">
                </div>
            </div>
            <div class="form_line">
                <div class="form_box">
                    <label for="card_expire" class="main_label">CARD EXPIRY DATE</label>
                    <input required id="card_expire" name="card_expire" type="text" pattern="">
                </div>
                <div class="form_box">
                    <label for="card_cvv" class="main_label">CVV CODE</label>
                    <input required id="card_cvv" name="card_cvv" type="text" pattern="">
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