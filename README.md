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

This table will record the data sent from the “payment.php” form (including the data gathered from “enquire.php”). This data contains information on the customer, product and payment details as specified in the previous assignments. The format of the database fields should match appropriate validation rules defined in assignments Part 1 and 2. If no rule exists for a particular field, choose an appropriate format.
