<?php
// On démarre une session
session_start();

// On inclut la connexion à la base
require_once('connect.php');

$sql = 'SELECT * FROM `Etat`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des libelles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
                <h1>Liste des libelles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>libelle</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $libelle){
                        ?>
                            <tr>
                                <td><?= $libelle['id'] ?></td>
                                <td><?= $libelle['libelle'] ?></td>
                                <td><a href="update.php?id=<?= $libelle['id'] ?>">Modifier</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
</body>
</html>