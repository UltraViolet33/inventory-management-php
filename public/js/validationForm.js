/**
 * checknameAndstock
 * check if the name input is filled
 * check if the name input is filled
 * return bool
 */
function form() {
    let form = document.getElementById('form');
    let name = form.name.value;
    let stock = form.stock.value;

    if (name == "") {
        document.getElementById('msg_erreur').innerHTML = 'Veuillez indiquer le nom du produit !';
        document.getElementById('msg_erreur').style.display = 'block';
        form.name.focus();
        return false;
    }
    else if (stock == "") {
        document.getElementById('msg_erreur').innerHTML = 'Veuillez indiquer le stock du produit !';
        document.getElementById('msg_erreur').style.display = 'block';
        form.stock.focus();
        return false;
    }
    else {
        document.getElementById('msg_erreur').style.display = 'none';
    }
    return true;
}