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
    

    public function getProduct(int $id): array 
    {
        $db = $this->dbConnect();
        $product = $db->prepare('SELECT * FROM products WHERE id_product = ?');
        $product->execute(array($id));
        return $product->fetch();
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