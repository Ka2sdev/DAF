<?php
// On démarre une session
require_once('connect.php');

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['libelle']) && !empty($_POST['libelle'])
){
        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $libelle = strip_tags($_POST['libelle']); 
        $sql = 'UPDATE `Etat` SET `libelle`=:libelle WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->bindValue(':libelle', $libelle, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "libelle modifié";
        require_once('close.php');

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `Etat` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le libelle
    $libelle = $query->fetch();

    // On vérifie si le libelle existe
    if(!$libelle){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un libelle</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
                <h1>Modifier un libelle</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="libelle">libelle</label>
                        <input type="text" id="libelle" name="libelle" class="form-control" value="<?= $libelle['libelle']?>">
                    </div>
                    <p>
                    <button >Envoyer</button>
</p>
                    <input type="hidden" value="<?= $libelle['id']?>" name="id">
                    
                </form>
</body>
</html>