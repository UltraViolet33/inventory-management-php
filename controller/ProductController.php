<?php

require_once 'model/Product.php';
require_once 'model/ProductManager.php';

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
        require_once 'views/home.php';
    }


    public function add(): void 
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
           if ($_POST['name'] && $_POST['stock'])
           {
               $name = $_POST['name'];
               $stock = (int) $_POST['stock'];

               $product = new Product($name, $stock);
               if ($product->insert()) 
               {
                    header('Location: /');
                    die;
               }
               else
               {
                    $error = 'Une erreur est survenue, veuillez réessayer';
               }
            }
            else 
            {
                $error = 'Veulliez remplir tous les champs';
            }
        }

        require_once 'views/addProduct.php';
    }

    public function edit(): void 
    {
        if (! isset($_GET['id']))
        {
            header('Location: /');
            die;
        }

        $id_product = $_GET['id'];
        $product = $this->productManager->getProduct($_GET['id']);
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
           if ($_POST['name'] && $_POST['stock'])
           {
               $name = $_POST['name'];
               $stock = (int) $_POST['stock'];

               $product = new Product($name, $stock);
               if ($product->update($id_product)) 
               {
                    header('Location: /');
                    die;
               }
               else
               {
                    $error = 'Une erreur est survenue, veuillez réessayer';
               }
            }
            else 
            {
                $error = 'Veulliez remplir tous les champs';
            }
        }

        require_once 'views/updateProduct.php';
    }

    public function delete(): void 
    {
        if (! isset($_GET['id']))
        {
            header('Location: /');
            die;
        }

        $id_product = $_GET['id'];
        $this->productManager->deleteProduct($_GET['id']);
        header('Location: /');
    }
}