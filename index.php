<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'cart.php';
    include 'templates/header.php';
?>


<div class="alert alert-success">
    Message
    <?php echo $message ?>
    <a href="#" class="badge badge-success">See your cart items</a>
</div>
<div class="row">
    <?php
        $cmd=$pdo->prepare("SELECT * FROM `products`");
        $cmd->execute();
        $productsList=$cmd->fetchAll(PDO::FETCH_ASSOC);
        //print_r($productsList);
    ?>
    <?php foreach ($productsList as $item){ ?>
        <div class="col-3">
            <div class="card">
                <img title="<?php echo $item['name']?>" 
                class="card-img-top" 
                src="<?php echo $item['image']?>" 
                alt="Alternative" 
                data-toggle="popover" 
                data-content="<?php echo $item['description']?>" 
                data-trigger="hover" 
                height="300px">
                <div class="card-body">
                    <span><?php echo $item['name']?></span>
                    <h5 class="card-title">$<?php echo $item['price']?></h5>
                    <p class="card-text"><?php echo $item['description']?></p>

                    <form action="" method="post">
                        <input type="hidden" name="idproduct" id="idproduct" value="<?php echo openssl_encrypt($item['idproduct'], ENCR, KEY);?>">
                        <input type="hidden" name="name" id="name" value="<?php echo openssl_encrypt($item['name'], ENCR, KEY);?>">
                        <input type="hidden" name="price" id="price" value="<?php echo openssl_encrypt($item['price'], ENCR, KEY);?>">
                        <input type="hidden" name="available" id="available" value="<?php echo openssl_encrypt(1, ENCR, KEY);?>">

                        <button class="btn btn-primary" 
                        name="btnAction" 
                        value="add" 
                        type="submit">
                        Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
<?php include 'templates/footer.php'; ?>