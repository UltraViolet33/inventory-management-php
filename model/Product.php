<?php

/**
 * Product.php
 * Manage the product
 * @author Ulysse Valdenaire
 * 19/01/2022
 */

require_once('Database.php');

/**
 * Class Product extends class Database
 */
class Product extends Database
{

    private $name;
    private $stock;

    /**
     * __construct
     *
     * @param  string $name
     * @param  int $stock
     * set the database
     * @return void
     */
    public function __construct($name, $stock)
    {
        $this->name = $name;
        $this->stock = $stock;
        $this->setDatabase();
    }

    /**
     * insertProduct
     * @return int
     */
    public function insertProduct()
    {
        $product = $this->dbConnect()->prepare('INSERT INTO products(nameProduct, stockProduct)
            VALUES(?, ?)');
        $affectedLines = $product->execute(array($this->name, $this->stock));
        return $affectedLines;
    }

    /**
     * updateProduct
     * @param  mixed $id
     * @return int
     */
    public function updateProduct($id)
    {
        $product = $this->dbConnect()->prepare('UPDATE products SET nameProduct = ?, stockProduct = ? WHERE idProduct = ?');
        $affectedLines = $product->execute(array($this->name, $this->stock, $id));
        return $affectedLines;
    }

    /**
     * deleteProduct
     * @param  mixed $id
     * @return int
     */
    public function deleteProduct($id)
    {
        $req = $this->dbConnect()->prepare('DELETE * FROM products WHERE idProduct = ?');
        $affectedLines = $req->execute(array($id));
        return $affectedLines;
    }
}
