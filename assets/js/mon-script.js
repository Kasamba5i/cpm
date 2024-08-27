function isValidPhoneNumber(phoneNumber) {
    // Expression régulière pour vérifier la validité d'un numéro de téléphone
    // On vérifie si le numéro contient uniquement des chiffres et s'il a une longueur de 10 ou 12 caractères
    var regex = /^\d{10}$|^\d{12}$/;
    return regex.test(phoneNumber);
}

function isValidLicensePlate(licensePlate) {
    // Expression régulière pour vérifier la validité d'une plaque d'immatriculation
    /*
    var regex = /^[A-Za-z0-9]{6}\s[A-Za-z0-9]{2}$/;
    return regex.test(licensePlate);
    */
    var regex = /^[0-9]{4}[A-Za-z]{2}[0-9]{2}$/;
    return regex.test(licensePlate);
}