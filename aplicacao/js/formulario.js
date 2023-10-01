function validarMedida(medida) {
    if (medida < 0) {
        alert("Por favor, insira um valor positivo.");
        return false;
    }
    return true;
}