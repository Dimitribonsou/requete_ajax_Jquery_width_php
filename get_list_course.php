<?php
require_once "function.php";

// Vérifiez si une requête AJAX pour le choix de la categorie a été envoyée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categorie'])) {
    $idCat = $_POST['categorie'];
    $listecourse = getCourseByCategorie($idCat);
    // retourner la lister des courses correspondantes
    foreach ($listecourse as $course) {
        echo '<option value="' . $course['IdCourse'] . '">' . $course['LibelleCourse'] . '</option>';
    }
    exit; // Terminez le script après avoir traité la requête AJAX
}

?>