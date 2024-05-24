function afficherMessageConfirmation(idCommande) {
    // Afficher le message de confirmation et le superposition
    document.getElementById("confirmationMessage").style.display = "block";
    document.getElementById("overlay").style.display = "block";
    
    // Stocker l'ID de la commande dans un attribut personnalisé
    document.getElementById("confirmationMessage").dataset.idCommande = idCommande;
}
function confirmerSuppressionOui() {
    // Récupérer l'ID de la commande
    var idCommande = document.getElementById("confirmationMessage").dataset.idCommande;
    
    // Supprimer l'élément correspondant à la div de la commande
    var commandeDiv = document.getElementById("commande_" + idCommande);
    if (commandeDiv) {
        commandeDiv.remove();
        console.log("La commande " + idCommande + " est marquée comme prête et supprimée.");
    }
    
    // Cacher le message de confirmation et la superposition
    document.getElementById("confirmationMessage").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}


