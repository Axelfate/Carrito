<?php 
session_start();

$message = "";
if(isset($_POST['btnAction']))
{
    switch($_POST['btnAction'])
    {
        case 'add':
            if(is_numeric(openssl_decrypt($_POST['idproduct'], ENCR, KEY))){
                $idproduct = openssl_decrypt($_POST['idproduct'], ENCR, KEY);
                $message.= "OK idProduct ".$idproduct."<br>";
            }
            else{
                $message.= "Error idProduct"."<br>";
            }

            if(is_string(openssl_decrypt($_POST['name'], ENCR, KEY))){
                $name = openssl_decrypt($_POST['name'], ENCR, KEY);
                $message.= "OK name ".$name."<br>";
            }
            else{
                $message.= "Error name"."<br>";
            }

            if(is_numeric(openssl_decrypt($_POST['available'], ENCR, KEY))){
                $available = openssl_decrypt($_POST['available'], ENCR, KEY);
                $message.= "OK available ".$available."<br>";
            }
            else{
                $message.= "Error available"."<br>";
            }

            if(is_numeric(openssl_decrypt($_POST['price'], ENCR, KEY))){
                $price = openssl_decrypt($_POST['price'], ENCR, KEY);
                $message.= "OK price ".$price."<br>";
            }
            else{
                $message.= "Error price"."<br>";
            }

            if(!isset($_SESSION['CART'])){
                $products = array(
                    'idproduct' => $idproduct,
                    'name' => $name,
                    'available' => $available,
                    'price' => $price
                );
                $_SESSION['CART'][0] = $products;
            }
            else{
                $Nproducts = count($_SESSION['CART']);
                $products = array(
                    'idproduct' => $idproduct,
                    'name' => $name,
                    'available' => $available,
                    'price' => $price
                );
                $_SESSION['CART'][$Nproducts] = $products;
            }
            $message = print_r($_SESSION,true);
        break;
    }
}


?>