<?php

echo showHeader();

$product_ids = array();

if (filter_input(INPUT_POST, 'add_to_cart')) {
    if (isset($_SESSION['shopping_cart'])) {



        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {

            $_SESSION['shopping_cart'][$count] = array
                (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_GET, 'quantity'),
            );
        } else {

            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    } else {
        $_SESSION['shopping_cart'][0] = array
            (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_GET, 'quantity'),
        );
    }
}

if (filter_input(INPUT_GET, 'action') == 'delete') {

    foreach ($_SESSION['shopping_cart'] as $key => $product) {

        if ($product['id'] == filter_input(INPUT_GET, 'id')) {

            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

function pre_r($array) {
    echo'<pre>';
    print-r($array);
    echo'</pre>';
}
?>
<HTML>
    <head>

        <link rel = "cart" type = "text/css" href = "cart.css">

    </head>

    <div class="menu">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="mainpage.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px ;font-family: Georgia ">PHP Developers Store</a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li style="padding-top: 8px"> <?php if (isset($_SESSION['name'])) { ?> <a><span class="glyphicon glyphicon-user" style="  color:white ; font-size: 15px; font-weight: bold  ">
                                    <?PHP echo $_SESSION['name']; ?> </span></a> </li>
                        <li><a href="seller.php"><span class="glyphicon glyphicon-barcode" style="padding-top: 10px"></span> Seller page</a></li>
                    <?PHP } ?>    
                    <li><?php if (isset($_SESSION['name'])) { ?><li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="padding-top: 10px"></span> Logout</a></li> 
                        <select class="glyphicon glyphicon-log-in" style="padding-top: 5px; margin-top: 10px"> Serach
                            <option> Computers </option>
                            <option> Laptops</option>
                            <option> Cameras</option>
                        </select>                            
                    <?PHP } else {
                        ?> <li><a href="signUp.php" ><span class="glyphicon glyphicon-user"style="padding-top: 10px"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="padding-top: 10px"></span> Login</a></li>

                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
    <?php
    echo showFooter();
    ?>