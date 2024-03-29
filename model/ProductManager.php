<?php

require_once 'Database.php';
    
class ProductManager extends Database
{

    public function __construct()
    {
        $this->setDatabase();  
    }
    

    public function selectAllProducts(): array
    {
        $db = $this->dbConnect();
        $result = $db->query('SELECT * FROM products');
        return $result->fetchAll();
    }
    
    /**
     * getProduct
     * @param  mixed $id
     * @return array
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