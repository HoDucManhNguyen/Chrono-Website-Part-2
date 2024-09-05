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
    <meta name="author" content="Duy Khang Nguyen, Nguyen Ho Duc Manh">
    <title>Payment page</title>

    <link href="styles/enquire.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    require_once("settings.php");
    // Check onnection to database
    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    // Initialize variable

    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        echo "<p>Database connection success</p>";
    }

    // Sanitise function to remove leading/ trailing, backslashes and HTML control characters
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Checks if process was triggered by a form submit, if not return to payment.php
    if (isset($_POST["title"])) {
        $_SESSION['title'] = sanitise_input($_POST["title"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["first_name"])) {
        $_SESSION['first_name'] = sanitise_input($_POST["first_name"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["last_name"])) {
        $_SESSION['last_name'] = sanitise_input($_POST["last_name"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["email"])) {
        $_SESSION['email'] = sanitise_input($_POST["email"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["phone_number"])) {
        $_SESSION['phone_number'] = sanitise_input($_POST["phone_number"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["street_addr"])) {
        $_SESSION['street_addr'] = sanitise_input($_POST["street_addr"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["city"])) {
        $_SESSION['city'] = sanitise_input($_POST["city"]);
    } else {
        header("location: payment.php");
    }

    /*try {
        $customer_state_check = isset($_POST["customer_state"]);
        $checking = is_null($customer_state_check);
        echo "<p>$checking</p><br>";
        echo "<p>No Exception at customer state $customer_state_check</p>";
    } catch (Exception $e) {
        echo "<p>Exception at customer state</p>";
    }*/

    /*if (!empty($_POST["customer_state"])){
        echo "<p>not empty</p>";
    } else {
        header("location: payment.php");
    }*/

    $_SESSION['customer_state'] = sanitise_input($_POST["customer_state"]);
    echo "<p>My state is " . $_SESSION['customer_state'] . "</p>";

    if (isset($_POST["postcode"])) {
        $_SESSION['postcode'] = sanitise_input($_POST["postcode"]);
    } else {
        header("location: payment.php");
    }

    $_SESSION['order_product'] = sanitise_input($_POST["order_product"]);

    if (isset($_POST["order_quantity"])) {
        $_SESSION['order_quantity'] = sanitise_input($_POST["order_quantity"]);
    } else {
        header("location: payment.php");
    }

    $_SESSION['card_type'] = sanitise_input($_POST["card_type"]);

    if (isset($_POST["card_name"])) {
        $_SESSION['card_name'] = sanitise_input($_POST["card_name"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["card_number"])) {
        $_SESSION['card_number'] = sanitise_input($_POST["card_number"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["card_expire"])) {
        $_SESSION['card_expire'] = sanitise_input($_POST["card_expire"]);
    } else {
        header("location: payment.php");
    }

    if (isset($_POST["card_cvv"])) {
        $_SESSION['card_cvv'] = sanitise_input($_POST["card_cvv"]);
    } else {
        header("location: payment.php");
    }

    // Check if table orders exist
    $check_table = "orders";
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$check_table'");
    if ($result->num_rows != 0) {
        echo "<p>table orders exists</p>";
    } else {
        echo "<p>table orders not found1</p>";
        $create_table_query = "CREATE TABLE orders (
            order_id int(3) not null PRIMARY KEY AUTO_INCREMENT, 
            order_time datetime not null, 
            order_status varchar(255) DEFAULT 'PENDING', 
            order_product varchar(255) not null, 
            order_quantity int(11) not null, 
            order_cost int(20) not null, 
            card_type varchar(255) not null, 
            card_name varchar(255) not null, 
            card_number varchar(20) not null, 
            card_expire varchar(5) not null, 
            card_cvv int(3) not null, 
            order_phone_number varchar(20) not null);";
        $result = mysqli_query($conn, $create_table_query);
    }

    // Check if table personal exist
    $check_table = "customers";
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$check_table'");
    if ($result->num_rows != 0) {
        echo "<p>table customers exists</p>";
    } else {
        echo "<p>table customers not found2</p>";
        $create_table_query = "CREATE TABLE customers ( 
            title varchar(255) not null, 
            first_name varchar(255) not null, 
            last_name varchar(255) not null, 
            email varchar(255) not null, 
            phone_number int(10) not null PRIMARY KEY, 
            street_addr varchar(255) not null, 
            city varchar(255) not null, 
            customer_state varchar(255) not null, 
            postcode varchar(9) not null);";
        $result = mysqli_query($conn, $create_table_query);
    }

    // Sanitise all inputs --MANH NGUYEN--

    // Check input format using Regex (need to check) --MANH NGUYEN--
    echo "<p><br>START</p>";
    $errMsg = "";

    if ($_SESSION['first_name'] == "") {
        $errMsg .= "<p>You must enter your first name.</p>";
        $_SESSION['error_first_name'] = "You must enter your first name.";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $_SESSION['first_name'])) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
        $_SESSION['error_first_name'] = "Only alpha letters allowed in your first name.";
    } else {
        $_SESSION['error_first_name'] = null;
    }


    if ($_SESSION['last_name'] == "") {
        $errMsg .= "<p>You must enter your last name.</p>";
        $_SESSION['error_last_name'] = "You must enter your last name.";
    } elseif (!preg_match("/^[a-zA-Z-]*$/", $_SESSION['last_name'])) {
        $errMsg .= "<p>Only alpha letters and hyphen are allowed in your last name.</p>";
        $_SESSION['error_last_name'] = "Only alpha letters allowed in your last name.";
    } else {
        $_SESSION['error_last_name'] = null;
    }


    if ($_SESSION['email'] == "") {
        $errMsg .= "<p>You must enter your email.</p>";
        $_SESSION['error_email'] = "You must enter your email.";
    } elseif (!preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $_SESSION['email'])) {
        $errMsg .= "<p>Your email must follow the following form: chrono@gmail.com</p>";
        $_SESSION['error_email'] = "Your email must follow the following form: chrono@gmail.com";
    } else {
        $_SESSION['error_email'] = null;
    }

    if ($_SESSION['phone_number'] == "") {
        $errMsg .= "<p>You must enter your phone number.</p>";
        $_SESSION['error_phone_number'] = "You must enter your phone number.";
    } elseif (!preg_match("/^[0-9]{10}$/", $_SESSION['phone_number'])) {
        $errMsg .= "<p>Your phone number must have 10 digits.</p>";
        $_SESSION['error_phone_number'] = "Your phone number must have 10 digits.";
    } else {
        $_SESSION['error_phone_number'] = null;
    }

    if ($_SESSION['street_addr'] == "") {
        $errMsg .= "<p>You must enter your street address.</p>";
        $_SESSION['error_street_addr'] = "You must enter your street address.";
    } elseif (!preg_match("/^[a-zA-Z0-9 _\/]*$/", $_SESSION['street_addr'])) {
        $errMsg .= "<p>Only your house address.</p>";
        $_SESSION['error_street_addr'] = "Only your house address.";
    } else {
        $_SESSION['error_street_addr'] = null;
    }

    if ($_SESSION['city'] == "") {
        $errMsg .= "<p>You must enter your city name.</p>";
        $_SESSION['error_city'] = "You must enter your city name.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_SESSION['city'])) {
        $errMsg .= "<p>Only your city name.</p>";
        $_SESSION['error_city'] = "Only your city name.";
    } else {
        $_SESSION['error_city'] = null;
    }

    if ($_SESSION['customer_state'] == "default") {
        $errMsg .= "<p>You must select your state.</p>";
        $_SESSION['error_customer_state'] = "You must select your state.";
    } else {
        $_SESSION['error_customer_state'] = null;
    }

    if ($_SESSION['postcode'] == "") {
        $errMsg .= "<p>You must enter the postcode of your city.</p>";
        $_SESSION['error_postcode'] = "You must enter the postcode of your city.";
    } elseif (!preg_match("/^[0-9]{5,9}$/", $_SESSION['postcode'])) {
        $errMsg .= "<p>Your postcode must have from 5 to 9 digits " . $_SESSION['postcode'] . "</p>";
        $_SESSION['error_postcode'] = "Your postcode must have from 5 to 9 digits";
    } else {
        $_SESSION['error_postcode'] = null;
    }

    if ($_SESSION['order_product'] == "default") {
        $errMsg .= "<p>You must select your product.</p>";
        $_SESSION['error_order_product'] = "You must select your product.";
    } else {
        $_SESSION['error_order_product'] = null;
    }

    if ($_SESSION['order_quantity'] == "") {
        $errMsg .= "<p>You must enter the quantity of the product you want to buy.</p>";
        $_SESSION['error_order_quantity'] = "You must enter the quantity of the product you want to buy.";
    } elseif (!is_numeric($_SESSION['order_quantity'])) {
        $errMsg .= "<p>Only numbers allowed for the quantity.</p>";
        $_SESSION['error_order_quantity'] = "Only numbers allowed for the quantity.";
    } else {
        $_SESSION['error_order_quantity'] = null;
    }

    if ($_SESSION['card_type'] == "default") {
        $errMsg .= "<p>You must select your card type.</p>";
        $_SESSION['error_card_type'] = "You must select your card type.";
    } else {
        $_SESSION['error_card_type'] = null;
    }

    if ($_SESSION['card_name'] == "") {
        $errMsg .= "<p>You must enter the cardholder name.</p>";
        $_SESSION['error_card_name'] = "You must enter the cardholder name.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_SESSION['card_name'])) {
        $errMsg .= "<p>Only alpha letters allowed in the cardholder name.</p>";
        $_SESSION['error_card_name'] = "Only alpha letters allowed in the cardholder name.";
    } else {
        $_SESSION['error_card_name'] = null;
    }

    if ($_SESSION['card_number'] == "") {
        $errMsg .= "<p>You must enter card number.</p>";
        $_SESSION['error_card_number'] = "You must enter card number.";
    } else {
        $_SESSION['error_card_number'] = null;
    }

    if ($_SESSION['card_type'] === "Visa") {
        if (!preg_match("/^(4)([0-9]{15})$/", $_SESSION['card_number'])) {
            $errMsg .= "<p>Visa card must have 16 digits and starts with number 4.</p>";
            $_SESSION['error_card_number'] = "Visa card must have 16 digits and starts with number 4.";
        } else {
            $_SESSION['error_card_number'] = null;
        }
    }
    if ($_SESSION['card_type'] === "Master") {
        if (!preg_match("/^(5[1-5])([0-9]{14})$/", $_SESSION['card_number'])) {
            $errMsg .= "<p>MasterCard must have 16 digits and starts with number 51 through to 55.</p>";
            $_SESSION['error_card_number'] = "MasterCard must have 16 digits and starts with number 51 through to 55.";
        } else {
            $_SESSION['error_card_number'] = null;
        }
    }
    if ($_SESSION['card_type'] === "AE") {
        if (!preg_match("/^(3[4]|3[7])([0-9]{13})$/", $_SESSION['card_number'])) {
            $errMsg .= "<p>American Express card must have 15 digits and starts with number 34 or 37.</p>";
            $_SESSION['error_card_number'] = "American Express card must have 15 digits and starts with number 34 or 37.";
        } else {
            $_SESSION['error_card_number'] = null;
        }
    }

    if ($_SESSION['card_expire'] == "") {
        $errMsg .= "<p>You must enter card expiry date following format: mm-yy.</p>";
        $_SESSION['error_card_expire'] = "You must enter card expiry date.";
    } elseif (!preg_match("/^[0-9]{2}-[0-9]{2}$/", $_SESSION['card_expire'])) {
        $errMsg .= "<p>Card expiry date must follow the following format: mm-yy.</p>";
        $_SESSION['error_card_expire'] = "Card expiry date must follow the following format: mm-yy.";
    } else {
        $_SESSION['error_card_expire'] = null;
    }

    if ($_SESSION['card_cvv'] == "") {
        $errMsg .= "<p>You must enter card verification value.</p>";
        $_SESSION['error_card_cvv'] = "You must enter card verification value.";
    } elseif (!preg_match("/^[0-9]{3}$/", $_SESSION['card_cvv'])) {
        $errMsg .= "<p>Card cvv must have 3 digits.</p>";
        $_SESSION['error_card_cvv'] = "Card cvv must have 3 digits only.";
    } else {
        $_SESSION['error_card_cvv'] = null;
    }

    if ($errMsg != "") {
        header("location:fix_order.php");
    } else {
        header("location:receipt.php");
        // MANH -- insert to db

        // table personal FIX all to session variable
        $sql_table_personal = "customers";
        $title = $_POST["title"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $phone_number = $_POST["phone_number"];
        $street_addr = $_POST["street_addr"];
        $city = $_POST["city"];
        $customer_state = $_POST["customer_state"];
        $postcode = $_POST["postcode"];

        $sql_new_cus_check = "SELECT phone_number FROM customers WHERE phone_number=$phone_number";
        $cus_check_result = mysqli_query($conn, $sql_new_cus_check);

        if ($cus_check_result->num_rows == 0) {
            $query_personal = "INSERT INTO $sql_table_personal 
                (title, first_name, last_name, email, phone_number, street_addr, city, customer_state, postcode) 
                VALUES ('$title', '$first_name', '$last_name', '$email', '$phone_number', '$street_addr', '$city', '$customer_state', '$postcode')";
        }

        $result_personal = mysqli_query($conn, $query_personal);
        if (!$result_personal) {
            echo "<p>Something is wrong with $query_personal</p>";
        } else {
            echo "<p>Successfully added new information record1</p>";
        }

        // table order
        $sql_table_order = "orders";
        $order_product = $_SESSION['order_product'];
        $order_quantity = $_SESSION['order_quantity'];
        switch ($_SESSION['order_product']) {
            case "novelties":
                $order_cost = 45000*(int)$order_quantity;
                break;
            case "apex":
                $order_cost = 50000*(int)$order_quantity;
                break;
            case "zenith":
                $order_cost = 47000*(int)$order_quantity;
                break;
            case "radiance":
                $order_cost = 49000*(int)$order_quantity;
                break;
            case "empyrean":
                $order_cost = 58000*(int)$order_quantity;
                break;
            case "horizon":
                $order_cost = 55000*(int)$order_quantity;
                break;
            case "luminary":
                $order_cost = 46000*(int)$order_quantity;
                break;
            case "odyssey":
                $order_cost = 51000*(int)$order_quantity;
                break;
        }
        $_SESSION['order_cost'] = $order_cost;
        $card_type = $_SESSION['card_type'];
        $card_name = $_SESSION['card_name'];
        $card_number = $_SESSION['card_number'];
        $card_expire = $_SESSION['card_expire'];
        $card_cvv = $_SESSION['card_cvv'];
        $order_phone_number = $_SESSION['phone_number'];

        $query_order = "INSERT INTO $sql_table_order (`order_id`, `order_time`, `order_status`, `order_product`, `order_quantity`, `order_cost`, `card_type`, `card_name`, `card_number`, `card_expire`, `card_cvv`, `order_phone_number`) VALUES (NULL, CURRENT_TIMESTAMP(), 'PENDING', '$order_product', '$order_quantity', '$order_cost', '$card_type', '$card_name', '$card_number', '$card_expire', '$card_cvv', '$order_phone_number');";

        $result_order = mysqli_query($conn, $query_order);
        if (!$result_order) {
            echo "<p>Something is wrong with $query_order</p>";
        } else {
            echo "<p>Successfully added new information record2</p>";
        }

        // query to select order_time from orders table
        $query_order_time = "select order_id, order_time, order_status FROM orders WHERE order_phone_number = '$order_phone_number'";
        $result = mysqli_query($conn, $query_order_time);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['order_time'] = $row["order_time"];
        $_SESSION['order_status'] = $row["order_status"];
        $_SESSION['order_id'] = $row["order_id"];

        // query to select order_id from orders table
        $query_order_id = "";

        mysqli_close($conn);
    }

    echo "<p>end</p>";
    if ($errMsg == "") {
        $insert_table_query = "";
    }

    ?>
    <a href="fix_order.php">link to fix_order<br></a>
    <a href="receipt.php">link to receipt</a>
</body>

</html>