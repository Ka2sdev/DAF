<?php
$user = "admin";
$password = "root";
$database = "fsb3";
$table = "AGENT";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>AGENTS</h2><ol>"; 
  foreach($db->query("SELECT ID, nom, DateDeNaissance FROM $table") as $row) {
    echo "<li>" . $row['ID'] . $row['nom'] "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}