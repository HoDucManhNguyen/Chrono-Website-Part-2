<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Assignment 1">
    <meta name="author" content="Ho Duc Manh Nguyen">
    <title>Watches page</title>

    <!-- Link to style.css file -->
    <link rel="stylesheet" href="styles/product.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <!--The header section starts-->
    <?php
        include("header.inc");
    ?>
    <!--The header section ends-->


    <!-- The banner section starts -->
    <section id="banner" style="background-image: url(images/home.jpeg)">
        <h4 class="product_h4">Our Collection</h4>
        <h2 id="product_h2">Timeless style</h2>
        <h1 id="product_h1">at your fingertips</h1>
        <button>Buy now</button>
    </section>
    <!-- The banner section ends -->


    <!-- The component section starts -->
    <section id="component">
        <div class="co-box">
            <img src="images/component1.png" alt="component1">
            <h6 id="product_h6">Elegance</h6>
        </div>

        <div class="co-box">
            <img src="images/component2.jpeg" alt="component2">
            <h6 id="product_h6">Classic</h6>
        </div>

        <div class="co-box">
            <img src="images/component3.jpeg" alt="component3">
            <h6 id="product_h6">Luxurious</h6>
        </div>
    </section>
    <!-- The component section ends -->


    <!-- The about us section starts -->
    <section id="about-us">
        <div id="title_product">
            <h2 id="product_h2">About us</h2>
            <p>The affirmation that endures over time</p>
        </div>

        <div id="history">
            <h2 id="product_h2">History established</h2>
            <p>Chrono is an iconic watch brand that has been providing quality timepieces for
                over two centuries. Founded in the United States, the brand has established itself
                as a luxurious, professional, classic, and elegant watchmaker. Its timeless designs
                and unparalleled craftsmanship have made Chrono a name synonymous with sophistication,
                exclusivity, and status. Designed for both men and women over 30 years old, Chrono
                timepieces are crafted to perfection, exuding refinement and grandeur. The brand's
                collections boast a diverse range of styles, from the classic and understated to the
                bold and extravagant. Each watch is designed to complement the wearer's personality,
                elevating their style and adding a touch of sophistication. Chrono's clientele is rich
                and affluent, seeking watches that make a statement of power and luxury. The brand's watches
                are priced between $45,000 to $60,000, making them exclusive and reserved for the most
                discerning and elite. Chrono's timepieces are not only elegant and stylish but also functional
                and durable, with each watch created to last a lifetime.
            </p>

            <p>When you come to us, you can also enjoy
                the following incentives:</p>

            <ol>
                <li>Warranty 12 months</li>
                <li>Reasonable repair policy</li>
                <li>Be returned within 14 days</li>
            </ol>

        </div>

        <aside>
            <img src="images/aside.png" alt="aside-banner">
            <div class="limited-signup">
                <span>Titanium X</span>
                <h2 id="product_h2">Limited Edition</h2>
                <h5>Sign up for a chance to own</h5>
                <button>Sign Up</button>
            </div>
        </aside>

    </section>




    <!-- The product section starts -->
    <section id="product">
        <h2 id="product_h2">Our Collection</h2>
        <p>Where function meets fashion</p>
        <div class="pro-container">
            <div class="pro">
                <img src="images/product1.png" alt="product1">
                <div class="des">
                    <span>Novelties</span>
                    <h5>Timeless elegance on your wrist</h5>
                    <h4 class="product_h4">$45,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product2.png" alt="product2">
                <div class="des">
                    <span>Apex</span>
                    <h5>A symbol of success and style</h5>
                    <h4 class="product_h4">$50,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product3.png" alt="product3">
                <div class="des">
                    <span>Zenith</span>
                    <h5>Luxury redefined, every time</h5>
                    <h4 class="product_h4">$47,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product4.png" alt="product4">
                <div class="des">
                    <span>Radiance</span>
                    <h5>Crafted to perfection, made to last</h5>
                    <h4 class="product_h4">$49,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product5.png" alt="product5">
                <div class="des">
                    <span>Empyrean</span>
                    <h5>The ultimate accessory for any occasion</h5>
                    <h4 class="product_h4">$58,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product6.png" alt="product6">
                <div class="des">
                    <span>Horizon</span>
                    <h5>Elevate your wrist game with our professional watches</h5>
                    <h4 class="product_h4">$55,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product7.png" alt="product7">
                <div class="des">
                    <span>Luminary</span>
                    <h5>The perfect balance of form and function</h5>
                    <h4 class="product_h4">$46,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>

            <div class="pro">
                <img src="images/product8.png" alt="product8">
                <div class="des">
                    <span>Odyssey</span>
                    <h5>Exceptional watches for exceptional individuals</h5>
                    <h4 class="product_h4">$51,000</h4>
                    <select name="type" class="type">
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </div>
        </div>

        <table id="detail">
            <tr>
                <th>Edition / Function</th>
                <th>Chronograph</th>
                <th>Water resistance</th>
                <th>Automatic movement</th>
                <th>Multiple time zones</th>
                <th>Moon phase</th>
            </tr>
            <tr>
                <td class="active-row">Novelties</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td class="active-row">Apex</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td class="active-row">Zenith</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            <tr>
                <td class="active-row">Radiance</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td class="active-row">Empyrean</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            <tr>
                <td class="active-row">Horizon</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            <tr>
                <td class="active-row">Luminary</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td class="active-row">Odyssey</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
        </table>
    </section>
    <!-- The product section ends -->

    <!-- The title of sm-banner starts -->
    <div id="title-banner">
        <h2 id="product_h2">Our World</h2>
        <p>Keeping you on time and on trend</p>
    </div>
    <!-- The title of sm-banner ends -->

    <!-- The small banner section starts -->
    <section id="sm-banner">
        <div class="banner-box" style="background-image: url(images/sm-banner1.jpeg)">
            <h4 class="product_h4">Kylian</h4>
            <p>Mbappé</p>
            <button>Buy Now</button>
        </div>

        <div class="banner-box banner-box2" style="background-image: url(images/sm-banner2.jpeg)">
            <h4 class="product_h4">Dina </h4>
            <p>Asher-Smith</p>
            <button>Buy Now</button>
        </div>
    </section>
    <!-- The small banner section ends -->

    <!--The footer section starts-->
    <?php
        include("footer.inc");
    ?>
    <!--The footer section ends-->

</body>

</html>