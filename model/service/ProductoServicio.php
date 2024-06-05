<?php

class ProductoServicio {

    

    private IProductoRepository $repository;

    public function __construct() {
        $this->repository = new ProductoRepository();
    }

    /* Get all products */

    public function getProductos(): array {

        $notas = $this->repository->getProductos();

        return $notas;
    }

}

?>