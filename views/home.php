<?php

/**
 * home.php
 * @author Ulysse Valdenaire
 * 19/01/2022
 */
?>

<?php $title = "Accueil" ?>
<?php ob_start(); ?>

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
                    <?php foreach ($products as $product) {
                    ?>
                        <tr>
                        
                            <td><?= $product['nameProduct'] ?></td>
                            <td><?= $product['stockProduct'] ?></td>
                            <td><a href="index.php?action=updateForm&amp;id=<?= $product['idProduct']?>"><button class="btn btn-primary">Modifier</button></a></td>
                            <td><a href="index.php?action=delete&amp;id=<?= $product['idProduct']?>"><button class="btn btn-primary">Supprimer</button></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>