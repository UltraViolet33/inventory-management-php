<?php
/**
 * ProductManager.php
 * Manage the product
 * @author Ulysse Valdenaire
 * 19/01/2022
 */

    require_once('Database.php');
    
    /**
     * ProductManager extends Database
     */
    class ProductManager extends Database
    {
        
        /**
         * __construct
         *
         * @return void
         */
        public function __construct()
        {
            
            $this->setDatabase();  
        }
        
        /**
         * selectAllProducts
         *
         * @return void
         */
        public function selectAllProducts()
        {
            $db = $this->dbConnect();
            $result = $db->query('SELECT * FROM products');
            $products = $result->fetchAll();
            return $products;
        }
        
        /**
         * getProduct
         *
         * @param  mixed $id
         * @return void
         */
        public function getProduct($id)
        {
            $db = $this->dbConnect();
            $product = $db->prepare('SELECT * FROM products WHERE idProduct = ?');
            $product->execute(array($id));
            $result = $product->fetch();
            return $result;
        }
        
        /**
         * deleteProduct
         *
         * @param  mixed $id
         * @return void
         */
        public function deleteProduct($id)
        {
            $req = $this->dbConnect()->prepare('DELETE FROM products WHERE idProduct = ?');
            $affectedLines = $req->execute(array($id));
            return $affectedLines;
        }
    }