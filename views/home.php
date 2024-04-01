<?php $title = "Accueil";
ob_start(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <h1 class="text-center">Liste des produits</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['stock_amount'] ?></td>
                            <td><a href="/product/edit?id=<?= $product['id_product']?>"><button class="btn btn-primary">Modifier</button></a></td>
                            <td><a href="index.php?action=delete&amp;id=<?= $product['id_product']?>"><button class="btn btn-primary">Supprimer</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); 
require_once 'template.php'; ?>