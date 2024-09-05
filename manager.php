<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Order searching engine</title>
  
  <link href="styles/manager.css" rel="stylesheet">
</head>

<body>

<?php include("header.inc"); ?>

<?php
  function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function login($valid) {
    echo '<form id="login_form" method="POST" action="manager.php">
      <label class="login_lb" for="user">Username (enter "admin"): </label>
      <input class="login" type="text" name="user"></input><br/>
      <label class="login_lb" for="pass">Password (enter "admin"): </label>
      <input class="login" type="password" name="pass"></input><br/>';
    if($valid == "invalid") {
      echo '<p class="err_mss">Incorrect username or password</p>';
    }
    echo '<input id="login_sm" type="submit" name="submit" value="Log in"></input>
    </form>';
  }

  if(isset($_POST["user"]) && isset($_POST["pass"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if($user == 'admin' && $pass == 'admin') {

      //connect to database
      require_once("settings.php");
      $ord_table = "orders";
      $ord_attr = "order_id, order_time, order_status, order_product, order_quantity, order_cost";
      $cus_table = "customers";
      $cus_attr = "first_name, last_name";
      $show = "SELECT 
        orders.order_id,
        customers.first_name,
        customers.last_name,
        orders.order_time,
        orders.order_product,
        orders.order_quantity,
        orders.order_cost,
        orders.order_status
        FROM orders
        LEFT JOIN customers
        ON orders.order_phone_number = customers.phone_number";

      //verify connection
      if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } 

      //delete order on click
      if(isset($_POST["del_id"]) && isset($_POST["del_status"])) {

        $id = $_POST["del_id"];
        $order_status = $_POST["del_status"];

        if($order_status == "PENDING") {   

          $sql_del = "DELETE FROM $ord_table WHERE order_id=$id";
          $result3 = mysqli_query($conn,$sql_del); 

          if($result3) {
            // header("location: manager.php");
            echo '<p class="succ_mss">delete successfully</p>';
          } 
        } else {
            echo '<p class="err_mss">only pending order can be deleted!</p>';
          }
      }

      //update order_status
      if (isset($_POST["upd_id"])) {
        $upd_order_status = $_POST["upd_order_status"];
        $upd_id = $_POST["upd_id"];
      
        $sql_upd = "UPDATE $ord_table 
          SET order_status = '$upd_order_status' 
          WHERE order_id = $upd_id";
        $result2 = mysqli_query($conn,$sql_upd);

          
        if($result2) {
          // header("location: manager.php");
          echo '<p class="succ_mss">update successfully</p>';
        } else {
          echo '<p class="err_mss">sth went wrong!</p>';
        }
      }

      function search($formName, $queryFilter) {
        global $conn, $show, $result;
        if(isset($_POST["$formName"])) {
          $query = $show . " " . $queryFilter;
          $result = mysqli_query($conn, $query);
          return 'glow';
        } 
      }

      $result = mysqli_query($conn, $show);
      $pend = search("pending_prod", "WHERE orders.order_status LIKE '%PENDING%'");
      $asc = search("cost_asc", "ORDER BY (orders.order_cost * orders.order_quantity) ASC");
      $desc = search("cost_desc", "ORDER BY (orders.order_cost * orders.order_quantity) DESC");

      if(isset($_POST["all_order"])) {
        $result = mysqli_query($conn, $show);
        $all = "glow";
      } else {
        $all = '';
      }
      
      echo '<h1>Welcome, admin!</h1>     

      <form class="form2" method="POST" action="manager.php" novalidate="novalidate">
        <input type="hidden" name="user" value="admin">
        <input type="hidden" name="pass" value="admin">
        <label class="lb" for="sort_name">Search by customer\'s name:</label>
        <input class="inp_txt" type="text" name="sort_name">
        <input class="sm_btn2" type="submit" value="GO">
      </form>
    
      <form class="form2" method="POST" action="manager.php" novalidate="novalidate">
        <input type="hidden" name="user" value="admin">
        <input type="hidden" name="pass" value="admin">
        <label class="lb" for="sort_prod">Search by product name:</label>
        <input class="inp_txt" type="text" name="sort_prod">
        <input class="sm_btn2" type="submit" value="GO">
      </form>

      <section>
        <form class="form1" method="POST" action="payment.php" novalidate="novalidate">
          <input class="sm_btn" type="submit" value="add order">
        </form>

        <form class="form1" method="POST" action="manager.php" novalidate="novalidate">
          <input type="hidden" name="user" value="admin">
          <input type="hidden" name="pass" value="admin">
          <input class="sm_btn" id="'. $all .'" type="submit" value="view all orders">
          <input type="hidden" name="all_order">
        </form>

        <form class="form1" method="POST" action="manager.php" novalidate="novalidate">
          <input type="hidden" name="user" value="admin">
          <input type="hidden" name="pass" value="admin">  
          <input type="hidden" name="pending_prod">
          <input class="sm_btn" id="'. $pend .'" type="submit" value="view pending order">
        </form>

        <form class="form1" method="POST" action="manager.php" novalidate="novalidate">
          <input type="hidden" name="user" value="admin">
          <input type="hidden" name="pass" value="admin">
          <input class="sm_btn" id="'. $asc .'" type="submit" name="cost_asc" value="view cost ascending">
          <input type="hidden" name="cost_asc">
        </form>

        <form class="form1" method="POST" action="manager.php" novalidate="novalidate">
          <input type="hidden" name="user" value="admin">
          <input type="hidden" name="pass" value="admin">
          <input class="sm_btn" id="'. $desc .'" type="submit" name="cost_desc" value="view cost descending">
          <input type="hidden" name="cost_desc">
        </form>
      </section>';

      if(isset($_POST["sort_name"])) {
        $search_query_name = sanitize($_POST["sort_name"]);
        
        if(empty($search_query_name)) {
          echo "<p class='err_mss'>You must enter information to search</p>"; 
        } else {
          $query = "$show WHERE 
            CONCAT($cus_table.first_name, ' ', $cus_table.last_name)
            LIKE '%$search_query_name%'";
          $result = mysqli_query($conn, $query);
        }
      }
      if(isset($_POST["sort_prod"])) {
        $search_query_prod = sanitize($_POST["sort_prod"]);        
      
        if(empty($search_query_prod)) {
          echo "<p class='err_mss'>You must enter information to search</p>"; 
        } else {
          $query = "$show 
            WHERE orders.order_product
            LIKE '%$search_query_prod%'";
          $result = mysqli_query($conn, $query);
        }  
      }
      
      if(!$result) {
        echo "<p>Something went wrong with $query</p>";
      } elseif($result->num_rows==0) {
        echo '<p id="no_rs_mss">No result found</p>';
      } else {
        //display retrieve records    
        echo '<table class="styled-table">';
        echo "<thead><tr>\n"
          ."<th scope='col'>No.</th>\n"
          ."<th scope='col'>First Name</th>\n"
          ."<th scope='col'>Last Name</th>\n" 
          ."<th scope='col'>Date</th>\n"
          ."<th scope='col'>Product</th>\n"
          ."<th scope='col'>Quantity</th>\n"
          ."<th scope='col'>Total Cost</th>\n"
          ."<th scope='col'>Status</th>\n"
          ."<th scope='col'></th>\n"
          ."<th scope='col'></th>\n"
          ."</tr></thead>\n";

        //retrieve current record pointed by the result pointer
        while($row = mysqli_fetch_assoc($result)) {
          $total_cost = $row["order_cost"] * $row["order_quantity"];
          echo "<tr>\n";
          echo "<td>",$row["order_id"],"</td>";
          echo "<td class='name'>",$row["first_name"],"</td>";
          echo "<td class='name'>",$row["last_name"],"</td>";
          echo "<td>",$row["order_time"],"</td>";
          echo "<td>",$row["order_product"],"</td>";
          echo "<td>",$row["order_quantity"],"</td>";
          echo "<td>",$total_cost,"</td>";
          
          echo '<td><form method="POST" action="manager.php" novalidate="novalidate">
            <input type="hidden" name="user" value="admin">
            <input type="hidden" name="pass" value="admin">';
          echo '<select class="select" name="upd_order_status">';
          echo '<option value="PENDING"' . ($row["order_status"] == 'PENDING' ? ' selected="selected"' : '') . '>PENDING</option>';
          echo '<option value="FULFILLED"' . ($row["order_status"] == 'FULFILLED' ? ' selected="selected"' : '') . '>FULFILLED</option>';
          echo '<option value="PAID"' . ($row["order_status"] == 'PAID' ? ' selected="selected"' : '') . '>PAID</option>';
          echo '<option value="ARCHIVED"' . ($row["order_status"] == 'ARCHIVED' ? ' selected="selected"' : '') . '>ARCHIVED</option>';
          echo '</select>';
          echo '<input type="hidden" name="upd_id" value="' . $row["order_id"] . '"></td>';
          echo '<input type="hidden" name="user" value="admin"></td>';
          echo '<input type="hidden" name="pass" value="admin"></td>';
          echo '<td><input class="upd_btn" type="submit" name="upd_od" value="update"></td>';
          echo '</form>';
          
          echo '<form method="POST" action="manager.php">';
          echo '<input type="hidden" name="del_id" value="'.$row["order_id"].'">';
          echo '<input type="hidden" name="del_status" value="'.$row["order_status"].'">';
          echo '<input type="hidden" name="user" value="admin">';
          echo '<input type="hidden" name="pass" value="admin">';
          echo '<td>';
          echo '<button class="del_btn" type="submit">Delete</button>';
          echo '</form>';
        }
        echo "</table>\n"; 
      }

      //free up memory
      mysqli_close($conn);
    } else {
      login('invalid');
    }
  } else {
    login('');
  }
?>

<?php include("footer.inc"); ?>

</body>
</html>