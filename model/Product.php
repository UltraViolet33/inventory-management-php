<?php

require_once 'Database.php';


class Product extends Database
{

    public function __construct(private string $name, private int $stock)
    {
        $this->setDatabase();
    }


    public function insert(): bool
    {
        $product = $this->dbConnect()->prepare('INSERT INTO products(name, stock_amount)
            VALUES(?, ?)');
        return $product->execute(array($this->name, $this->stock));
    }


    public function update(int $id): bool
    {
        $request = $this->dbConnect()->prepare('UPDATE products SET name = ?, stock_amount = ? WHERE id_product = ?');
        return $request->execute(array($this->name, $this->stock, $id));
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
