<?php
    include("./Model/Restaurant.php");

    $args = ['nom','adresse', 'restaurateur', 'description', 'devise'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $out=array_map(function($x){ return $_POST[$x];}, $args);
        $types = $_POST['types'];
        $prix = $_POST['prix'];
        $desc = $_POST['descPlats'];
        $filename = $_POST['filename'];

        $restaurant = new Restaurant(...$out);
        $restaurant->setPlats($types, $prix, $desc);
        //var_dump($restaurant);
        $restaurant->toXML($filename);
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
            <legend>Informations</legend>
            <p><label>Nom: <input type="text" name="nom"></label></p>
            <p><label>Adresse: <input type="text" name="adresse"></label></p>
            <p><label>Restaurateur: <input type="text" name="restaurateur"></label></p>
            <p><label>Description: <textarea name="description"></textarea></label></p>
        </fieldset>
        <fieldset>
            <legend>Plats</legend>
            <p>
                <label for="devise">Devise: </label>
                <select name="devise" id="devise" required>
                    <option value="EUR">EUR</option>
                    <option value="USD">USD</option>
                    <option value="XOF">XOF</option>
                </select>
            </p>
            <p><label>types: <input type="text" name="types"></label></p>
            <p><label>prix: <input type="text" name="prix"></label></p>
            <p><label>Descriptions: <textarea name="descPlats"></textarea></label></p>
        </fieldset>
        <fieldset>
            <legend>Fichier</legend>
            <p><label>Nom du fichier:<input type="text" name="filename"></label></p>
        <input type="submit" value="enregistrer"/>
</form>
</body>
</html>
