<?php

// Renvoie la liste de tous les billets, triés par identifiant décroissant
{
    $user = "admin";
    $password = "root";
    $database = "Ticketing";
    $bdd = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
    . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
    . ' order by BIL_ID desc');
  return $billets;
}