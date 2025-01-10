<?php
require_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestions coureurs </title>
</head>
<body>
    <main>
        <div class="titre">
            <h1 class="title"> Formulaire Dreen Sport</h1>
        </div>
        
        <div class="parti1">
            <form action="" class="form1">
                <div class="select1">
                    <span>Liste de Catégories</span>
                    <select name="categorie" id="categorie">
                      <option>Choisissez une categorie</option>
                        <?php
                        $listecategorie = getCategorie();
                        foreach ($listecategorie as $categorie) {
                            ?>
                            <option  value="<?php echo $categorie['IdCat'] ?>"><?php echo $categorie['LibelleCat'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="select1">
                    <span>Liste de Courses</span>
                    <select name="course" id="course">
                        <option>Selectionnez une categorie</option>
                    </select>
                </div>
                <!-- <div class="name">
                    <label for="name">nom :</label>
                    <input type="name" name="name" id="name">
                    <label for="rang">Rang :</label>
                    <input type="number" name="rang" id="rang">
                    <label for="time">Temps :</label>
                    <input type="number" name="time" id="time">
                </div> -->  
            </form>
        </div>
        <br>
        <div class="parti2 hidden" id="parti2">
            <form id="formulaire" class="fomr2">
                <div class="table">
                    <table>
                        <thead>
                            <caption>Listes des Coureurs</caption>
                            <tr>
                                <th>N•</th>
                                <th>Noms de personne</th>
                                <th>Rang</th>
                                <th>Temps couru</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="num" id="num" required placeholder="numéro" disabled></td>
                                <td><input type="text" name="name" id="name" required placeholder="name"></td>
                                <td><input type="number" name="rang" id="rang" required placeholder="Rang"></td>
                                <td><input type="time" name="time" id="time" required placeholder="Temps"></td>
                            </tr>
                        </thead>
                        <tbody id="table_content">
                            <!-- Les lignes de données seront insérées ici par AJAX -->
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="btn">
                    <button type="submit">Save</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
    </main>
    <script src="./jquery.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>