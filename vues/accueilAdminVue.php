<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nos articles - Administration</title>
        <link href="vues/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="vues/bootstrap3.3.5/blog.css" rel="stylesheet">
        <script src="vues/bootstrap3.3.5/jquery-2.1.4.min.js"></script>
        <script src="vues/bootstrap3.3.5/js/bootstrap.min.js"></script>
        
        <script src="vues/js/messcripts.js"></script>
    </head>
    <body>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="./">Accueil</a>
          <a class="blog-nav-item active" href="?ajout">Ajouter</a>
          <a class="blog-nav-item" href='?deco'>déconnexion</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Nos articles - Administration</h1>
        <p class="lead blog-description">Gestion de l'administration</p>
      </div>

      <div class="row">
        <div class="col-sm-12 blog-main">
<?php
if(empty($prend)) echo "<h3>Pas d'articles</h3>";
            foreach ($prend AS $valeur) {
                echo "<div class='blog-post'>";
                echo "<h2 class='blog-post-title'>$valeur->letitre</h2>";
                echo "<p>Ecrit le " . $valeur->ladate . " | Par $valeur->lelogin | ";
                if($modif) echo "<img src='vues/img/modif.png' onclick='document.location.href=\"?slug=$valeur->leslug\"' alt='modifier' /> |";
                if($sup) echo "<img src='vues/img/sup.png' onclick='supr(\"$valeur->leslug\" ,\"$valeur->id\")' alt='supprimer' /> |";
                echo "</p><p>".substr($valeur->letexte,0,300)."... <a href='?page=$valeur->leslug'>lire plus</a></div>";
                echo "<hr/>";

            }
            ?>
        </div>
      </div>
    </div>
    </body>
</html>