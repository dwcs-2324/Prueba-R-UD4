<?php

class ProductoController
{

    public $page_title;
    public $view;
    private $productoServicio;

    public const PANTALON_COOKIE = "pantalon";

    public function __construct()
    {
        $this->view = 'producto/list_products';
        $this->page_title = '';
        $this->productoServicio = new ProductoServicio();
    }

    /* List all products */

    public function list()
    {
        $this->page_title = 'Listado de productos';

        return $this->productoServicio->getProductos();
    }





    public function addToCart()
    {
        $prodId = -1;
        $qty = 0;

        if (isset($_POST["prodId"])) {
            $prodId = $_POST["prodId"];
        }

        if (isset($_POST["qty"])) {
            $qty = $_POST["qty"];
        }

        echo "prodId: $prodId";
        echo "qty: $qty";

        if ($prodId != -1 && $qty > 0) {

            //TO DO:  Completa el método addToCart de ProductoController para que se almacene en la sesión con clave carrito ($_SESSION["carrito"])  un array asociativo con clave el id del producto y el valor la suma acumulativa de todas las unidades de ese producto que se han ido añadiendo.

            //4- Crea una cookie con el nombre  'pantalon'  cuyo valor sea el número de veces que el usuario ha añadido el producto  a la cesta con id = 1 (el pantalón)  incluso aunque haya vaciado el carrito con anterioridad durante la misma sesión de usuario. Por ejemplo, si el usuario añade 2 unidades de pantalón, vacía el carrito y luego vuelve a añadir una unidad, el valor de la cookie debe ser 3.  La cookie 'pantalon' debe durar 24 horas. (2 puntos)       

        }
    }

    public function clearCart()
    {
        //TO DO: 
        //Completa el método clearCart de ProductoController para que vacíe el carrito y redirija a la lista de productos. (2 puntos)

    }
}
