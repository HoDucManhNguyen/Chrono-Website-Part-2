# Chrono-Website

## Table of Contents

- [Project Overview](#project-overview)
- [Assignment Objectives](#assignment-objectives)
- [Technical Requirements](#technical-requirements)
- [System Implementation](#system-implementation)
  - [Common Page Elements](#common-page-elements)
  - [Orders Database](#orders-database)
  - [Database Connection File](#database-connection-file)
  - [Payment Processing](#payment-processing)
  - [Order Processing](#order-processing)
  - [Manager Dashboard](#manager-dashboard)
- [CSS Styling](#css-styling)
- [Enhancements](#enhancements)
- [Folder Structure](#folder-structure)
- [Demo](#demo)
- [Authors](#authors)

## Project Overview
Chrono-Website is a comprehensive e-commerce platform designed to facilitate the exploration of advanced web development concepts, including dynamic content rendering with PHP, database management via MySQL, and front-end design utilizing HTML and CSS. The system extends beyond fundamental web functionalities by incorporating robust server-side scripting for order management and database integration, ensuring a seamless transactional workflow.

## Assignment Objectives
The overarching objectives of this project are as follows:
- Modularizing web components using PHP for enhanced maintainability.
- Implementing session management techniques to preserve user state.
- Validating and processing input data securely through server-side mechanisms.
- Structuring and maintaining an order management system within a MySQL database.
- Designing an administrative interface for order oversight and management.
- Ensuring seamless portability between development and production environments through the utilization of configuration files.

## Technical Requirements
### 1. Common Page Elements
To promote code modularity and maintainability, recurrent HTML structures—including navigation menus, headers, and footers—are encapsulated within distinct `.inc` files and programmatically incorporated within PHP scripts.

### 2. Orders Database
The MySQL relational database schema consists of an `orders` table defined as follows:
- `order_id` (Primary Key, Auto-incremented)
- `customer_details`
- `product_details`
- `payment_information`
- `order_cost`
- `order_time` (Timestamp, system-generated)
- `order_status` (Enum: PENDING, FULFILLED, PAID, ARCHIVED)

The `process_order.php` script programmatically initializes the `orders` table upon receiving the inaugural transaction if it does not already exist.

### 3. Database Connection File
A dedicated `settings.php` configuration file encapsulates database connection parameters, facilitating seamless portability across diverse deployment environments while ensuring security best practices in credential management.

### 4. Payment Processing
The `payment.php` module incorporates the following essential functionalities:
- Dynamic product selection with corresponding pricing structures.
- Quantity selection for itemized purchases.
- Input fields for credit card details, including card type, holder name, number, expiration date, and CVV.
- A checkout mechanism that submits transactional data to `process_order.php`.
- Strict enforcement of server-side validation, overriding client-side validation to ensure data integrity and security.

### 5. Order Processing
The `process_order.php` script executes the following key operations:
- Comprehensive input sanitization to mitigate injection vulnerabilities.
- Validation of form fields, including the enforcement of credit card formatting constraints.
- Calculation of order cost exclusively through server-side logic to prevent client-side manipulation.
- Secure insertion of validated orders into the `orders` database.
- Redirection of erroneous submissions to `fix_order.php` for necessary rectifications.
- Automatic generation of transactional receipts via `receipt.php` upon successful order completion.
- Restriction of direct script access to mitigate unauthorized data manipulation attempts.

### 6. Manager Dashboard
The `manager.php` administrative interface provides the following functionalities:
- A tabular overview of all recorded transactions.
- Order filtering capabilities based on customer name, product, status, and pricing.
- Real-time updating of order statuses (Pending, Fulfilled, Paid, Archived).
- Transactional deletion options for pending orders requiring cancellation.
- Restricted visibility of sensitive financial details to uphold data privacy regulations.

## CSS Styling
The website adheres to contemporary CSS3 styling conventions to ensure a cohesive, aesthetically refined, and fully responsive user interface.

## Enhancements
Additional functionalities implemented to augment the system include:
1. **Manager Authentication**: A credential-based login/logout system to restrict administrative access.
2. **Advanced Analytical Reporting**: Generation of insights, including sales trends, order frequency analysis, and product popularity metrics.
3. **Dynamic Sorting Mechanisms**: Enhanced administrative sorting capabilities for orders based on predefined criteria.
4. **Database Normalization**: Implementation of separate customer and product tables with appropriate relational mappings to optimize database efficiency.

Comprehensive documentation detailing these enhancements is provided within `enhancements3.php`, including implementation methodologies and references to external resources.

## Folder Structure
The project adheres to a structured directory hierarchy as follows:
```
assign2/
│── index.php
│── payment.php
│── process_order.php
│── receipt.php
│── fix_order.php
│── manager.php
│── enhancements3.php
│── settings.php
│── styles/
│   ├── style.css
│── images/
│── includes/
│   ├── header.inc
│   ├── footer.inc
│   ├── menu.inc
```
- **All primary PHP/HTML scripts** reside within the `assign2/` directory.
- **Relative pathing conventions** ensure cross-environment compatibility.

## Demo
### Live Demonstration
[Click Here](https://www.youtube.com/watch?v=Aln_md8Be24) to access a video demonstration of the system's functionality.


## Author

**Manh Nguyen**\
📧 Email: [manhnhd.vn@gmail.com](mailto\:manhnhd.vn@gmail.com)\
🔗 LinkedIn: [Manh Nguyen](https://www.linkedin.com/in/harrryy/)

