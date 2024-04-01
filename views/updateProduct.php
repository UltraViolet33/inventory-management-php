<?php $title = "Modifier un produit";
ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Modifier un produit</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
             <form id="form" onsubmit="return form()"  method="POST"> 
             <div id="msg_erreur">
                    <?php if(! empty($error)): ?>
                            <?= $error ?>
                        <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit : </label>
                    <input type="text" value="<?= $product['name']?>" name='name' id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock du produit : </label>
                    <input type="number" value="<?= $product['stock_amount']?>" name='stock' id="stock" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="valider" value="valider" >
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require_once 'template.php'; ?>