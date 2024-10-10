# Chrono-Website

## Purpose of the Assignment

To gain practical skills and knowledge in coding and using PHP server-side embedded scripting to extend the functionality of the website you developed in Part 1, by creating dynamic webpage content, accessing a separate MySQL database server, and using PHP to connect to this MySQL server. </br>

In particular, you will: 
+ Use PHP to include common webpage code (eg. menu, header, footer code)
+ Understand the ways that ‘state’ can be maintained between web pages
+ Use PHP to validate data sent in the “payment” HTML form to a new “process_order.php” page and if any errors, provide user feedback through a new “fix_order.php” form
+ Use PHP to create and store the order data in a server-side MySQL database table “orders”, and provide feedback through a new “receipt.php” page
+ Use PHP to query and update the status of the “orders”, through a new “manager.php” page
+ Understand how using a “settings.php” script, and relative links, can enable the website to be ported from a development environment to a testing environment

## Specified Requirements

### 1. Use PHP to reuse common elements in your website

PHP provides us with techniques to modularise and reuse our web application code. Rewrite your web pages so that the common static HTML elements such as menu, header and footer are written in common text files that are then “included” back into your web pages. Name the include file(s) with an .inc extension, replace the sections of HTML in your main pages with ‘include’ statements, and rename your main pages with a .php extension, so the php includes will be included.

### 2. Create an ‘orders’ database table

Create an ‘orders’ table in your MySQL database. </br>

This table will record the data sent from the “payment.php” form (including the data gathered from “enquire.php”). This data contains information on the customer, product and payment details as specified in the previous assignments. The format of the database fields should match appropriate validation rules defined in assignments Part 1 and 2. If no rule exists for a particular field, choose an appropriate format. </br>

In addition to the fields that record information from the “payment” form, add the following fields with appropriate data-types to the table:

* An auto-generated primary key field called ‘order_id’
* The total cost of the order ‘order_cost’
* Date / time of order (generated by the system) ‘order_time'
* A field called ‘order_status’ </br>

An ‘order status’ can have one of three values: PENDING | FULFILLED | PAID | ARCHIVED. When an order is created its status is always set to PENDING.

**Later, your “process_order.php” page should be able to create this table, if it does not already exist, when the first order is made.** </br>

### 3. Create a file to store your database connection variables “settings.php”

To enable your website to be easily ported to our “testing” environment (and in a workplace, ultimately to a production website platform), use a PHP include file, “settings.php” that contains the **connection variables as shown below**, and use this in your PHP to connect to your MySQL database on the feenix-mariadb database server.

<img width="590" alt="Screenshot 2024-09-05 at 6 34 33 PM" src="https://github.com/user-attachments/assets/82624f17-dc69-4d8e-8612-fbdb99ebc42e">

### 4.Payment “payment.php”

#### 4.1 Create the payment form with price, quantity and credit card information

Extend the enquire form to enable a user to purchase a product/service that they have selected. You can **either** 1) rename the enquire.php to payment.php then add the inputs listed below; or 2) add a new payment.php, make the enquire page submit to payment.php. Then include the inputs listed below in enquire/payment form accordingly. </br>

You will need to:
* Add some **price details** for various items in the product/service range, and add extra
options where applicable.
* Add one or more fields so a user can select the **quantity** of the product/service to be
purchased. For a product, the quantity might represent the number of items. For a service,
the quantity might represent the dates of hire, or the number of days.
Add more form inputs to include **credit card** payment details:
  + Credit card type (e.g. Visa, Mastercard, American Express) – no valid default
selection
  + Name on credit card
  + Credit card number
  + Credit card expiry date (mm-yy)
  + Card verification value (CVV)
* Have a ‘submit’ button with caption ‘Check Out’ </br>

Set the “payment.php” form action to “process_order.php”. When a customer decides to proceed with the order, a **Check Out**  button should submit the form, and all the customer and product information to the server-side script. (So you check that all name-value data has been correctly submitted.)

#### 4.2 Disable HTML validation

While client-side validation using HTML5 was used in previous assignments, in order to preserve the integrity of the server data, server-side data format checking should be implemented. </br>

In this assignment HTML5 form validation will be disabled. </br>

So we can test that server-side validation works correctly:
* Add the **novalidate="novalidate"** (or simply **novalidate**) attribute into your forms, to disable client- side HTML5.

### 5. Processing Orders “process_order.php”

Ensure the “payment.php” form action to “process_order.php”. Having disabled HTML5 form data validation, all form data format checking will now be implemented server-side, using PHP, after the data has been submitted by “payment.php”:
* All values received by “process_order.php” should be sanitized to remove leading and trailing spaces, backslashes and HTML control characters.
* Before an order is written to the **orders** table the data format rules need to be checked. These rules include rules specified in Part 1 (for customer details), rules for credit card (shown below) and other rules you think appropriate:
  + Credit card type must be one of Visa, Mastercard, or American Express
  + Credit cardnumber: exactly 15 or 16 digits. Credit card numbers must be checked against the selected card type according to the following rules:
    * Visa cards have 16 digits and start with a 4
    * Master Card have 16 digits and start with digits 51 through to 55
    * American Express has 15 digits and starts with 34 or 37.

If the input data does not meet format requirements, errors should be returned to “fix_order.php” a form version of the ‘payment’ page, and display all form control fields filled with data entered in enquire page and payment page, and with errors marked or highlighted. Do not fill the Credit Card details, these will need to be re-entered. The “fix_order.php” form should submit back to “process_order.php”, using method post. </br>

***Hint: error msg back to fix_order could be string or an array.*** </br>

If the input data is correctly validated by “process_orders.php”:
* Calculate the total cost of the order (do not rely on the client to send this information).
* Store the order in the orders table using a mysqli query.
* Return an order receipt webpage **“receipt.php”** to the user. This page should include all
the information stored in the record including the **order_id** and **order_status**.

The “process_order.php” page should not produce a html page. It should only process data and pass data to other webpages. (During development you might want to have this script echo back data.) </br>

The “process_order.php” page should include a check that if the database table ‘orders’ does not exist then create it. </br>

***The “process_order.php”, “fix_order.php” and “receipt.php” pages should not be able to be accessed directly by url through a browser.***

*Hint: check what data has been set and redirect.*

### 6. Managers Order report and Order Update Page “manager.php”

For convenience add an extra menu item to access this new Manager page. </br>

This web page allows the Manager to make queries about orders, display the result in an HTML table and update the status of an order. </br>

For each query clearly display: order number, order date, full details of the product including the cost, only the customer’s first and last names, order status. No credit card details should be displayed. </br>

To make the display presentable and easily readable, you might need to concatenate some fields.
The web page should give the manager the option to display:
* All orders
* Orders for a customer based on their name
* Orders for a particular product
* Orders that are pending
* Orders sorted by total cost

The Manager should be able to ‘update’ the status of an order from a link or button next to the order in the table, changing the status from (pending | fulfilled | paid | archived). </br>

The Manager can also ‘cancel’ (ie. ‘delete’) an order via this page. Only pending orders can be cancelled.

## CSS

All pages should be styled appropriately using CSS as in Part 1, and should be valid CSS3.

## Enhancements

As with Part 1 you have an opportunity to extend your learning by adding extensions/ enhancements to the main pages of your Web site, using techniques not covered in the tutorials. </br>

Briefly **list** and **describe** each enhancement implemented on a page called **enhancements3.php**:
* What it does and how it goes beyond the specified requirements.
* What does a programmer have to do to implement the feature.
* Reference any third party sources used to create the extension/enhancement

In this assignment we will consider PHP and MySQL enhancements. </br>
You are encouraged to be creative in thinking up possible enhancements. </br>

Examples of PHP / MySQL enhancements:
* Create Manager security, with a “Manager registration” page with server side validation requiring a unique username and a password rule, and store this information in a table. Create a “Manager Log-in” page to use the stored data, and control access to the manager web pages. Ensure the manager web page cannot be entered directly using a URL. </br>
Create a “Manager Log-out” page. Provide a ‘log-out’ link on the manager page if ‘logged in’.
* Provide a number of more advanced Manager reports based on compound queries. </br>
For example:
  + the most popular product ordered
  + fulfilled orders purchased between two dates the vendor enters othe average number of orders per day

* On the table on the Manager page, provide the ability to select a column heading, and re-sort the table in the order of that field. If selected again, reverse the order.
* Store customers’ details in a separate ‘customers’ data table and create a primary- foreign key link between the ‘customers’ and ‘orders’ tables.
* Store the product details and options in a separate ‘products’ data table, and dynamically fill the product page with that data. </br>

Up to two enhancements will be assessed, i.e., up to 20 marks will be awarded for enhancements.

## Web Site Folder Structure and Deployment Requirements

Your website folder structure should follow a similar structure as in Part 1 and 2. All files should be under a folder /assign2.

<img width="529" alt="Screenshot 2024-09-05 at 6 53 54 PM" src="https://github.com/user-attachments/assets/db62da2c-d746-4323-b408-72f9778712e8">

#### Notes:

* PHP/HTML files should only be in the base “assign2/” folder – not anywhere else.
* All links to your files (includes, CSS or images) should be relative. Do not use absolute links, as these links will be broken when files are transferred for
marking. No marks will be allocated if links are broken.

## Demo Pictures of Product

  
<img width="1166" alt="Screenshot 2024-09-05 at 7 00 51 PM" src="https://github.com/user-attachments/assets/c4f96f21-cecf-49ba-91ba-ec6ec13bcb55">

<img width="1166" alt="Screenshot 2024-09-05 at 7 02 31 PM" src="https://github.com/user-attachments/assets/b7826461-da4d-4a0b-a1e7-c81871e2c709">

<img width="1166" alt="Screenshot 2024-09-05 at 7 02 55 PM" src="https://github.com/user-attachments/assets/06737109-919b-4402-b8fa-8ad6e392df42">

<img width="1166" alt="Screenshot 2024-09-05 at 7 03 13 PM" src="https://github.com/user-attachments/assets/0df769f0-1b83-4d43-ae07-796f728df67b">

<img width="1166" alt="Screenshot 2024-09-05 at 7 03 32 PM" src="https://github.com/user-attachments/assets/1c906f44-5b57-4bf6-be22-86c5f9412468">

<img width="1166" alt="Screenshot 2024-09-05 at 7 03 46 PM" src="https://github.com/user-attachments/assets/27d38da4-dc21-4def-b302-631aa4ee1196">

<img width="1166" alt="Screenshot 2024-09-05 at 7 03 59 PM" src="https://github.com/user-attachments/assets/6bc68e01-5c99-486e-9f67-2b77f7b6dfe4">

<img width="1166" alt="Screenshot 2024-09-05 at 7 04 23 PM" src="https://github.com/user-attachments/assets/2142cacd-c816-4d20-a26c-4f427db95d3e">

<img width="1166" alt="Screenshot 2024-09-05 at 7 04 56 PM" src="https://github.com/user-attachments/assets/58885411-58bd-4657-9a0e-30b6179ec495">

<img width="1166" alt="Screenshot 2024-09-05 at 7 05 17 PM" src="https://github.com/user-attachments/assets/8ceeaf02-cde8-46e7-acf7-e3df5dd21972">

<img width="11166" alt="Screenshot 2024-09-05 at 7 05 37 PM" src="https://github.com/user-attachments/assets/c887c946-2fa7-4a7a-b11d-e64da527d03a">


## Link Demo
https://www.youtube.com/watch?v=Aln_md8Be24



## Authors

Name: Manh Nguyen (Harry) </br>
Email: manhnhd.vn@gmail.com </br>
LinkedIn: https://www.linkedin.com/in/harrryy/























