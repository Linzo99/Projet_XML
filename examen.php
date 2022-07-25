<?php
    include("./Model/Examen.php");

    $args = ['code', 'titre', 'annee', 'mois'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $filename = $_POST['filename'];
        $out = array_map(function($x){ return $_POST[$x];}, $args);
        $questions = array_map(function($x){ return $_POST['question'.$x];}, range(1,11));

        $examen = new Examen(...$out);
        $examen->setQuestions($questions);

        $examen->toXML($filename);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
         <fieldset>
        <legend>Examen</legend>
        <p>
            <label for="code">Code: </label>
            <input type="text" name="code" id="code" required>
        </p>
        <p>
            <label for="titre">Titre: </label>
            <input type="text" name="titre" id="titre" required>
        </p>
        <p>
            <label for="annee">Annee: </label>
            <input type="text" name="annee" id="annee" required>
        </p>
        <p>
            <label for="mois">Mois: </label>
            <select name="mois" id="mois" required>
                <option value="01">Janvier</option>
                <option value="02">Fevrier</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mais</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Aout</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Decembre</option>
            </select>
        </p>
        <fieldset>
            <legend>Questions</legend>
            <?php
                for($i=0; $i<11; $i++){?>
                    <p>
                        <label for="question<?=$i+1?>">question<?=$i+1?>: </label>
                        <textarea name="question<?=$i+1?>" id="question<?=$i+1?>" ></textarea>
                    </p>
                <?php }
            ?>
        </fieldset>
        <fieldset>
            <legend>Fichier</legend>
            <p><label>Nom du fichier:<input type="text" name="filename"></label></p>
            <input type="submit" value="enregistrer"/>
    </form>
</body>
</html>