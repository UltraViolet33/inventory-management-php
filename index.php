<?php
/**
 * index.php
 */
require_once('controller/ProductController.php');
require_once('model/ProductManager.php');
require_once('model/Product.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'addForm') {
        require('views/addProduct.php');
    } elseif ($_GET['action'] === "createProduct") {
        $name = $_POST['name'];
        $stock = (int)$_POST['stock'];
        $productController = new ProductController();
        $message = $productController->insertController($name, $stock);

        if ($message === 1) {
            $productManager = new ProductManager();
            $products = $productManager->selectAllProducts();
            require('views/home.php');
        } else {
            require('views/addProduct.php');
        }
    } elseif ($_GET['action'] === "updateForm") {
        if (isset($_GET['id'])) {
            $productManager = new ProductManager();
            $product = $productManager->getProduct($_GET['id']);
            require('views/updateProduct.php');
        }
    } elseif ($_GET['action'] === "updateProduct") {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $name = $_POST['name'];
            $stock = (int)$_POST['stock'];
            $productController = new ProductController();
            $message = $productController->updateController($name, $stock, $id);

            if ($message === 1) {
                $productManager = new ProductManager();
                $products = $productManager->selectAllProducts();
                require('views/home.php');
            } else {
                $productManager = new ProductManager();
                $product = $productManager->getProduct($_GET['id']);
                require('views/updateProduct.php');
            }
        }
    } elseif ($_GET['action'] === "delete") {
        $product = new ProductManager();
        $productManager = new ProductManager();
        $products = $productManager->selectAllProducts();
        require('views/home.php');
    }
} else {
    $productManager = new ProductManager();
    $products = $productManager->selectAllProducts();
    require('views/home.php');
}