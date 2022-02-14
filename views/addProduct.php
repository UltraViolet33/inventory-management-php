<?php
/**
 * home.php
 * @author Ulysse Valdenaire
 * 19/01/2022
 */
?>

<?php $title = "Ajouter un produit" ?>
<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Ajouter un produit</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form id="form" action="index.php?action=createProduct" onsubmit="return form()" method="POST">
                <div id="msg_erreur"></div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit : </label>
                    <input type="text" value="" name='name' id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock du produit : </label>
                    <input type="number" name='stock' id="stock" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="valider" value="valider">
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>