<?php
/**
 * ProductController.php
 * Controle the product
 * @author Ulysse Valdenaire
 * 19/01/2022
 */

require_once('model/Product.php');

/**
 * ProductController
 */
class ProductController
{

    /**
     * insertController
     *
     * @param  mixed $name
     * @param  mixed $stock
     * @return void
     */
    public function insertController($name, $stock)
    {
        if (is_string($name) && is_int($stock)) {
            $product = new Product($name, $stock);

            $insert = $product->insertProduct($name, $stock);

            if ($insert) {
                return 1;
            } else {
                return "Erreur veuillez réessayer 2";
            }
        } else {
            return "Erreur veuillez réessayer 1";
        }
    }

    /**
     * updateController
     *
     * @param  mixed $name
     * @param  mixed $stock
     * @param  mixed $id
     * @return void
     */
    public function updateController($name, $stock, $id)
    {
        if (is_string($name) && is_int($stock)) {
            $product = new Product($name, $stock);

            $update = $product->updateProduct($id);

            if ($update) {
                return 1;
            } else {
                return "Erreur veuillez réessayer 2";
            }
        } else {
            return "Erreur veuillez réessayer 1";
        }
    }
}