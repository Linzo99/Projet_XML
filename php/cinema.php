<?php
    include("../Model/Cinema.php");

    $args = ['titre','duree', 'genre', 'realisateur', 'annee_production', 'langue_diffusion', 'synopsis',
             'note_presse', 'note_spectateurs'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $out=array_map(function($x){ return $_POST[$x];}, $args);
        $acteurs = $_POST['acteurs'];
        $horaires = $_POST['horaires'];
        $filename = $_POST['filename'];

        $film = new Cinema(...$out);
        $film->setActeurs($acteurs);
        $film->setHoraires($horaires);
        $film->toXML($filename);
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
            <legend>Cinema</legend>
            <p><label>Titre: <input type="text" name="titre"></label></p>
            <p><label>Durée: <input type="text" name="duree"></label></p>
            <p><label>Genre: <input type="text" name="genre"></label></p>
            <p><label>Réalisateur: <input type="text" name="realisateur"></label></p>
        <fieldset>
            <legend>Acteurs</legend>
            <p><label>Noms: <input type="text" name="acteurs"></label></p>
        </fieldset>
        <p><label>Année de production: <input type="text" name="annee_production"></label></p>
        <p><label>Langue de diffusion: <input type="text" name="langue_diffusion"></label></p>
        <p><label>Synopsis: <input type="text" name="synopsis"></label></p>
        <p><label>Note presse: <input type="text" name="note_presse"></label></p>
        <p><label>Note spectateurs: <input type="text" name="note_spectateurs"></label></p>
        <fieldset>
            <legend>Horaires</legend>
            <p><label>horaire: <input type="text" name="horaires"></label></p>
        </fieldset>
        <fieldset>
            <legend>Fichier</legend>
            <p><label>Nom du fichier:<input type="text" name="filename"></label></p>
        <input type="submit" value="enregistrer"/>
</form>
</body>
</html>