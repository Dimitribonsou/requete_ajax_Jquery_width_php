<?php
require_once "function.php";
  // Vérifiez si une requête AJAX pour le choix de la course a été envoyée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course'])) {
    $idcourse = $_POST['course'];
    $listecoureur = getListCourreurByCourse($idcourse);

    if ($listecoureur) {
        // retourner la liste des coureurs correspondants
        foreach ($listecoureur as $coureur) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($coureur['IdSp']) . '</td>';
            echo '<td>' . htmlspecialchars($coureur['NomPrenom']) . '</td>';
            echo '<td>' . htmlspecialchars($coureur['Rang']) . '</td>';
            echo '<td>' . htmlspecialchars($coureur['TempsMis']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4">Aucun coureur trouvé pour cette course.</td></tr>';
    }
    exit; // Terminez le script après avoir traité la requête AJAX
} else {
    echo '<tr><td colspan="4" >ID course indisponible</td></tr>';
    exit;
}
?>