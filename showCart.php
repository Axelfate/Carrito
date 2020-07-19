<?php
    include 'global/config.php';
    include 'cart.php';
    include 'templates/header.php';
?>

<br>
<h3>Cart List</h3>
<?php if(!empty($_SESSION['CART'])) { ?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Name</th>
            <th width="15%" class="text-center">Qty</th>
            <th width="10%" class="text-center">Price</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total = 0; ?>
        <?php foreach($_SESSION['CART'] as $index=>$product) { ?>
        <tr>
            <td width="40%"><?php echo $product['name'] ?></td>
            <td width="15%" class="text-center"><?php echo $product['available'] ?></td>
            <td width="10%" class="text-center"><?php echo $product['price'] ?></td>
            <td width="20%" class="text-center"><?php echo number_format($product['price']*$product['available'],2); ?></td>

            <form action="" method="post">
            <input type="hidden" name="idproduct" id="idproduct" value="<?php echo openssl_encrypt($product['idproduct'], ENCR, KEY);?>">
                <td width="5%">
                    <button class="btn btn-danger" 
                    type="submit"
                    name="btnAction"
                    value="delete"
                    >Delete</button>
                </td>
            </form>
            
        </tr>
        <?php $total = $total+($product['price']*$product['available']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2); ?></h3></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
        Cart empty...
    </div>
<?php } ?>
<?php include 'templates/footer.php'; ?>