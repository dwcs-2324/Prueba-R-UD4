<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Producto
 *
 * @author wadmin
 */
class Producto {
    use ViewData;
    
    
    private ?int $id;  
    private string $nombre;
    private float $precio;
    private string $imagePath;
    
    public function __construct(?int $id=null, string $nombre="", float $precio=0, string $imagePath="") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagePath = $imagePath;
    }
    
    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getImagePath(): string {
        return $this->imagePath;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }

    public function setImagePath(string $imagePath): void {
        $this->imagePath = $imagePath;
    }



    
}
