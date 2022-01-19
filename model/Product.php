<?php


    require_once('Database.php');


    class Product extends Database
    {

        private $name;
        private $stock;

        public function __construct($name, $stock)
        {
            $this->name = $name;
            $this->stock = $stock; 
            $this->setDatabase();  
        }

        public function insertProduct()
        {
            $product = $this->dbConnect()->prepare('INSERT INTO products(nameProduct, stockProduct)
            VALUES(?, ?)');
            $affectedLines = $product->execute(array($this->name, $this->stock));
            return $affectedLines;
        }


        public function updateProduct($id)
        {
            $product = $this->dbConnect()->prepare('UPDATE products SET nameProduct = ?, stockProduct = ? WHERE idProduct = ?');
            $affectedLines = $product->execute(array($this->name, $this->stock, $id));
            return $affectedLines;
        }

        public function deleteProduct($id)
        {
            $req = $this->dbConnect()->prepare('DELETE * FROM products WHERE idProduct = ?');
            $affectedLines = $req->execute(array($id));
            return $affectedLines;
        }

       
    }


     $test = new Product('test', 65757534);
     var_dump($test->deleteProduct(1));