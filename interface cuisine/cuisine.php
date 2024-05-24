<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Interface Cuisine</title>
    <link rel="stylesheet" href="style/cuisine.css">
</head>
<body>
<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=menu'; // Nom de la base de données
$username = 'root';
$password = ''; // Modifiez si nécessaire

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour obtenir toutes les commandes
    $stmt = $conn->query("SELECT * FROM commande");

    // Récupération des résultats
    $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    $commandes = []; // Assurer que $commandes est défini en cas d'erreur
    
}

?>

<?php if (!empty($commandes)): ?>
    <?php foreach ($commandes as $commande): ?>
        <div id="commande_<?= $commande['idCommande'] ?>" class="commandes-style">
            <h2>Commande n°<?= htmlspecialchars($commande['idCommande']) ?>:</h2>
            <p>Numéro de table: <?= $commande['num_table'] ?></p>
            <p>Détails de la commande:<br><?= nl2br(htmlspecialchars($commande['order_details'])) ?></p>
            <p>Total Prix: <?= $commande['total_prix'] ?></p>
            <button onclick="afficherMessageConfirmation(<?= $commande['idCommande'] ?>)"> prête</button>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucune commande disponible.</p>
<?php endif; ?>

<div class="overlay" id="overlay"></div>
<div class="confirmation-message" id="confirmationMessage">
    <p>Êtes-vous sûr de vouloir marquer cette commande comme prête et la supprimer ?</p>
    <button onclick="confirmerSuppressionOui()">Oui</button>
    <button onclick="cacherMessage()">Non</button>
</div>

<script src="script/cuisine.js" defer></script>


</body>
</html>
