<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Create/Read </title>
</head>
<body>
    <fieldset>
        <legend>Creer un fichier</legend>
        <p><a href="php/cinema.php">Cinema</a></p>
        <p><a href="php/examen.php">Examen</a></p>
        <p><a href="php/restaurant.php">Restaurant</a></p>
    </fieldset>
    <br/>
    <br/>
    <fieldset>
        <legend>Voir un fichier</legend>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept=".xml"/>
            <input type="submit" value="Charger"/>
        </form>
    </fieldset>
    <?php 
        function print_node($node){
            ?>
                <tr>
                    <td>&lt<?=$node->getName()?>&gt</td>
                    <td><?=$node?></td>
                    <td><?=$node->attributes()?></td>
                </tr>
            <?php
            foreach($node as $k=>$v){
                if($v->children()){
                    print_node($v);
                }
                else{?>
                    <tr>
                        <td><?=$k?>: </td>
                        <td><?=$v?></td>
                    </tr>
                <?php
                }
            } 

        }
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_FILES['file']['name'];
            $xml = simplexml_load_file($name);
            $type_name = $xml->getName();
            ?>
            <fieldset>
                <legend>Details <?=$type_name?> </legend>
            <table>
            <?php
                print_node($xml);
            ?>
            </table>
            </fieldset>
        <?php
        }
    ?>
</body>
</html>