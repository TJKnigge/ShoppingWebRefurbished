<?php
include 'General.php';
echo showHeader();
?>

<div class="container" style=" padding-top: 100px">
<?php
$connect = mysqli_connect('localhost', 'root', '', 'shop');
$query = 'SELECT * FROM products ORDER by id ASC';
$result = mysqli_query($connect, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-sm-4 col-md-3">
                    <form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img src="image/<?php echo $product['image']; ?>" class="img-responsive" />
                            <h4 class="text-info"><?php echo $product['name']; ?></h4>
                            <h4>€ <?php echo $product['price']; ?></h4>

                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
            <?php
            if (isset($_SESSION['name'])) {
                ?>

                                <input type = "text" name = "quantity" class = "form-control" value = "1" />
                                <input type = "submit" name = "add_to_cart" style = "margin-top:5px;" class = "btn btn-info"
                                       value = "Add to Cart" />
                <?php
            }
            ?>
                        </div>
                    </form>
                </div>
            <?php
        }
    }
}
if (isset($_SESSION['shopping_cart'])) {
    if (count($_SESSION['shopping_cart']) > 0) {
        ?>

            <div style="clear:both"></div>  
            <br />  
            <div class="table-responsive">  
                <table class="table">  
                    <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
                    <tr>  
                        <th width="40%">Product Name</th>  
                        <th width="10%">Quantity</th>  
                        <th width="20%">Price</th>  
                        <th width="15%">Total</th>  
                        <th width= "5%">Action</th>  
                    </tr>  
        <?php
    }
}
if (!empty($_SESSION['shopping_cart'])) {

    $total = 0;

    foreach ($_SESSION['shopping_cart'] as $key => $product) {
        ?>  
                    <tr>  
                        <td><?php echo $product['name']; ?></td>  
                        <td><?php echo $product['quantity']; ?></td>  
                        <td><?php echo $product['price']; ?></td>  
                        <td><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
                        <td>
                            <a href="index.php?action=delete&id=<?php echo $product['id']; ?>">
                                <div class="btn-danger">Remove</div>
                            </a>
                        </td>  
                    </tr>  
        <?php
        $total = $total + ($product['quantity'] * $product['price']);
    }
    ?>  
                <tr>  
                    <td colspan="3" align="right">Total</td>  
                    <td align="right">€ <?php echo number_format($total, 2); ?></td>  
                    <td></td>  
                </tr>  
                <tr>
                    <td colspan="5">
                        <a href="payment.html" class="button">Checkout</a>
                    </td>
                </tr>
    <?php
}
?>  
        </table>  
    </div>
</div>
<?php
echo showFooter();
?>