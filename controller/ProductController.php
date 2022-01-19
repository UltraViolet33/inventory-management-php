<?php


    require_once('model/Product.php');



    class ProductController
    {


        public function insertController($name, $stock)
        {
            if(is_string($name) && is_int($stock))
            {
                $product = new Product($name, $stock);

                $insert = $product->insertProduct($name, $stock);

                if($insert)
                {
                    return 1;

                }
                else
                {
                    return "Erreur veuillez réessayer 2";
                }
            }
            else
            {
                return "Erreur veuillez réessayer 1";
            }
        }

        public function updateController($name, $stock, $id)
        {
            if(is_string($name) && is_int($stock))
            {
                $product = new Product($name, $stock);

                $update = $product->updateProduct($id);

                if($update)
                {
                    return 1;

                }
                else
                {
                    return "Erreur veuillez réessayer 2";
                }
            }
            else
            {
                return "Erreur veuillez réessayer 1";
            }
        }
    }


     $test = new ProductController();
     echo $test->updateController('tesoùjopùt2', 5, 2);