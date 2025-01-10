
$(function(){
    //code pour charger les courses en fonctions des categories
    $('#categorie').on('change', () => {
        const id_categorie = $('#categorie').val();
        // Envoi d'une requête AJAX POST vers index.php
        $.post('get_list_course.php', {
            //  passage de la catégorie sélectionnée comme donnée
            categorie: id_categorie
        })
        .done(function(response) {
            // En cas de succès, mettre à jour le contenu du select des courses
            $('#course').html(response);
        })
        .fail(function(error) {
            // En cas d'erreur, afficher un message dans la console
            console.log("Erreur lors de la requête : " + error);
        });
    });
// code pour charger les informations des coureurs  dans le tableau en fonction des courses
    $('#course').on('change', function(){
        const id_course = $('#course').val();
        $.post('get_data_coureur.php', {
            course: id_course
        }).done(function(response){
            // afficher le tableau en ajoutant la classe show
            $('#parti2').addClass('show');
            // modifier le dom pour ajouter le contenu de ma reponse dans ma balise tbody
            $('#table_content').html(response);
            console.log(response);
        })
        .fail(function(error){
            // En cas d'erreur, on affiche un message dans la console
            console.log("Erreur lors de l'envoie des donnees : " + error);
        });
    });
});



