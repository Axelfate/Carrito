<?php

//session_start();

$mensaje=" ";

//Evaluar botón 'Agregar al carrito' por medio de su atributo 'name'

if(isset($_POST['btnAccion']))
{
    switch(isset($_POST['btnAccion']))
    {
        // Evaluando el valor 'Agregar' del botón
        case 'Agregar':
            // En caso de agregar un elemento al carrito, se enviará la info a través del formulario; validamos que toda la info esté correcta
            if(is_numeric(openssl_decrypt($_POST['id'], COD, KEY)))
            {   
                //Obtenemos ID desencriptado
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje.= "ID correcto".$ID."</br>";
            }
            else
            {   // no se pudo descifrar ID
                $mensaje.= "ID incorrecto";
            }

            // nombre del producto
            if(is_string(openssl_decrypt($_POST['nombre'], COD, KEY)))
            {   
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje.= "nombre correcto".$NOMBRE."</br>";
            }
            else
            {   
                $mensaje.= "nombre incorrecto";
            //break;
            }

            // precio del producto
            if(is_numeric(openssl_decrypt($_POST['precio'], COD, KEY)))
            {   
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje.= "precio correcto".$PRECIO."</br>";
            }
            else
            {   
                $mensaje.= "precio incorrecto";
            //break;
            }


            // cantidad del producto      $_POST['cantidad']      
            if(is_numeric(openssl_decrypt(1, COD, KEY)))
            {   
                $CANTIDAD = openssl_decrypt(1, COD, KEY);
                $mensaje.= "cantidad correcta".$CANTIDAD."</br>"; 
            }
            else
            {   
                $mensaje.= "cantidad incorrecta";
            //break;
            }

            // Evaluando si la variable de sesión no tiene ningún elemento agregado
            if(!isset($_SESSION['CARRITO']))
            {
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                );
                //Se agrega a la sesión carrito
                $_SESSION['CARRITO'][0]=$producto;

            }else{  // Si existe algún elemento en la sesión 'CARRITO' se contabiliza y se va agregando a la sesión 'CARRITO'
                $NumeroProductos = count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            }
            // Mensaje de los elementos agregados a la sesión 'CARRITO'
            $mensaje = print_r($_SESSION, true); 

        break;
    }
}

?>