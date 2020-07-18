<?php
    include 'global/config.php';
    include 'global/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shpping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">LOGO</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Carrito</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="alert alert-success">
            Message
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
                        <img title="<?php echo $item['name']?>" class="card-img-top" src="<?php echo $item['image']?>" alt="Alternative" data-toggle="popover" data-content="<?php echo $item['description']?>" data-trigger="hover">
                        <div class="card-body">
                            <span><?php echo $item['name']?></span>
                            <h5 class="card-title">$<?php echo $item['price']?></h5>
                            <p class="card-text"><?php echo $item['description']?></p>
                            <button class="btn btn-primary" type="button" name="btnAction" value="add" type="submit">Add to cart</button>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
</body>
</html>