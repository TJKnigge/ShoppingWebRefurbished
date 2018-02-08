<?php

echo showHeader();
?>
<HTML>
    <head>

        <link rel = "footerStyle" type = "text/css" href = "footerStyle.css">

    </head>
    <body>

        <div class="content">
        </div>
        <footer id="myFooter">
            <div class="container">
                <ul>
                    <li><a href="mainpage.php">PHP Developer Store</a></li>
                    <li><a target="_blank" href="https://www.itph-academy.nl/">Contact us</a></li>
                    <li><a href="index.php">Our Products</a></li>
                    <li><a href="termsofservice.html">Terms of service</a></li>
                </ul>
                <p class="footer-copyright">© 2018 Copyright is Reserved For PHP Developer Team </p>
            </div>
            <div class="footer-social">
                <a target="_blank" href="https://nl-nl.facebook.com/" class="social-icons"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://www.google.nl/?gfe_rd=cr&dcr=0&ei=hzxfWrL-BtLc8AeUioCoDg&gws_rd=ssl" class="social-icons"><i class="fa fa-google-plus"></i></a>
                <a target="_blank" href="https://twitter.com/" class="social-icons"><i class="fa fa-twitter"></i></a>
            </div>
        </footer>

        <?php
        echo showFooter();
        ?>