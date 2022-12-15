<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Ticketing</title>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1 id="titreBlog">Ticketing
          
        </h1></a>
        <p>Je vous souhaite la bienvenue sur ce serveur de ticket.</p>
      </header>
      <div id="contenu">
        <?php
        $user = "admin";
        $password = "root";
        $database = "BaseTicketing";
        $bdd = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        $billets = $bdd->query('select TIC_ID as id, TIC_DATE as date,'
          . ' TIC_TITRE as titre, TIC_CONTENU as contenu , ETA_LIB as lib  from T_TICKET , ETAT WHERE ETAT.ETA_ID=T_TICKET.TIC_ID'
          . ' order by TIC_ID desc');
        foreach ($billets as $billet): ?>
          <article>
            <header>
              <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
              <time><?= $billet['date'] ?></time>
            </header>
            <p><?= $billet['contenu'] ?></p><?= $billet['lib'] ?></p>
          </article>
          <hr />
        <?php endforeach; ?>
      </div> <!-- #contenu -->
      <footer id="piedBlog">
        Serveur de Ticket réalisé avec PHP, HTML5 et CSS par un élève de BTS SIO.
      </footer>
    </div> <!-- #global -->
  </body>
</html>