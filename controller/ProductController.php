<?php
/**
 * ProductController.php
 * Controle the product
 * @author Ulysse Valdenaire
 * 19/01/2022
 */

// require_once('model/Product.php');
require_once 'model/ProductManager.php';


/**
 * ProductController
 */
class ProductController
{
    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function index()
    {
        $products = $this->productManager->selectAllProducts();
        require('views/home.php');
    }

    /**
     * insertController
     * @param  string $name
     * @param  int $stock
     * @return string
     */
    public function insertController($name, $stock)
    {
        if (is_string($name) && is_int($stock)) {

            $product = new Product($name, $stock);
            $insert = $product->insertProduct($name, $stock);

            if ($insert) {
                return 1;
            } else {
                return "Erreur veuillez réessayer";
            }
        } else {
            return "Erreur veuillez réessayer";
        }
    }

    /**
     * updateController
     * @param  string $name
     * @param  int $stock
     * @param  mixed $id
     * @return string
     */
    public function updateController($name, $stock, $id)
    {
        if (is_string($name) && is_int($stock)) {

            $product = new Product($name, $stock);
            $update = $product->updateProduct($id);

            if ($update) {
                return 1;
            } else {
                return "Erreur veuillez réessayer";
            }
        } else {
            return "Erreur veuillez réessayer";
        }
    }
}