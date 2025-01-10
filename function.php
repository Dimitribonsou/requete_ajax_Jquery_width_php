<?php
  // echo "Cote serveur !";
  function getCategorie()
  {
                try
                  {
                      require "connexion.php";
                      if(isset($base))
                      {
                          // requete de creation de compte
                           // Requête pour récupérer les informations de l'étudiant
                            $req = "SELECT * FROM `categorie` ";
                            // Préparation de la requête SQL
                            $requete = $base->prepare($req);
                            // Exécution de la requête SQL
                            $requete->execute();
                            $resultat = $requete->fetchall();
                            // retourner la liste des hotels retrouver
                          return $resultat;
                      }
                      else
                      {
                          return null;
                      }
                  }
                  catch(PDOException $ex)
                  {
                     $messages= "erreur lors de l'affichage des informations:".$ex->getMessage();
                     return null;
                  }
    }
  function getCourseByCategorie($idcategorie)
  {
    try
    {
        require "connexion.php";
        if(isset($base))
        {
            // requete de creation de compte
             // Requête pour récupérer les informations de l'étudiant
              $req = "SELECT * FROM `course` WHERE IdCat=:idcategorie ";
              // Préparation de la requête SQL
              $requete = $base->prepare($req);
              $requete->bindParam(":idcategorie",$idcategorie);
              // Exécution de la requête SQL
              $requete->execute();
              $resultat = $requete->fetchall();
              // retourner la liste des hotels retrouver
            return $resultat;
        }
        else
        {
            return null;
        }
    }
    catch(PDOException $ex)
    {
       echo "erreur lors de l'enregistrement des informations :".$ex->getMessage();
       return null;
    }
  }
//   $resultat=getCourseByCategorie(1);
//   var_dump($resultat);
  function getListCourreurByCourse($idcourse)
  {
    try
    {
        require "connexion.php";
        if(isset($base))
        {
            // requete de creation de compte
             // Requête pour récupérer les informations de l'étudiant
              $req = "SELECT `IdSp`,  c.`NomPrenom`, `Rang`, `TempsMis` FROM `sprint` s INNER JOIN coureur c on c.NumC=s.NumC  WHERE IdCourse=:idcourse ";
              // Préparation de la requête SQL
              $requete = $base->prepare($req);
              $requete->bindParam(":idcourse",$idcourse);
              // Exécution de la requête SQL
              $requete->execute();
              $resultat = $requete->fetchall();
              // retourner la liste des hotels retrouver
            return $resultat;
        }
        else
        {
            return null;
        }
    }
    catch(PDOException $ex)
    {
       echo "erreur lors de l'enregistrement des informations :".$ex->getMessage();
       return null;
    }
  }
  function NewSprint($idcourse,$idcoureur,$rang,$tempsmis,$age)
  {
    try
    {
        include_once("connexion.php");
        if (isset($base))
        {


            // Requête de création de compte
            $req = "INSERT INTO `coureur`( `IdCourse`,`NumC`,`Rang`, `TempMis`, `age`) VALUES (:idcourse,:idcoureur,:rang,:tempsmis,:age)";
            
            // Préparation de la requête SQL
            $requete = $base->prepare($req);
            // passage des valeurs des parametres
            $requete->bindParam(":idcourse", $idcourse);
            $requete->bindParam(":idcoureur", $idcoureur);
            $requete->bindParam(":rang", $rang); 
            $requete->bindParam(":tempsmis", $tempsmis); 
            $requete->bindParam(":age", $age); 
            // Exécution de la requête SQL
            $requete->execute();
            // retourner un message de success
            return "Création de compte réussie avec succès !";
        }
        else
        {
            return "Erreur de connexion à la base de données";
        }   
    }
    catch (PDOException $ex)
    {
       return "Erreur lors de l'enregistrement des informations : " . $ex->getMessage();
    } 
  }
?>