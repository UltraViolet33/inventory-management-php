<?php


    require_once('Database.php');


    class ProductManager extends Database
    {

        public function __construct()
        {
            
            $this->setDatabase();  
        }

        public function selectAllProducts()
        {
            $db = $this->dbConnect();
            $result = $db->query('SELECT * FROM products');
            $products = $result->fetchAll();
            return $products;
        }

        public function getProduct($id)
        {
            $db = $this->dbConnect();
            $product = $db->prepare('SELECT * FROM products WHERE idProduct = ?');
            $product->execute(array($id));
            $result = $product->fetch();
           

            return $result;
        }
    }
    //  $test = new ProductManager();
    // var_dump($test->getProduct(1));
