<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nos articles - Accueil</title>
        <link href="vues/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="vues/bootstrap3.3.5/blog.css" rel="stylesheet">
        <script src="vues/bootstrap3.3.5/jquery-2.1.4.min.js"></script>
        <script src="vues/bootstrap3.3.5/js/bootstrap.min.js"></script>
        
    </head>
    <body>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" >Accueil</a>
          <a class="blog-nav-item" href="?connect">connexion</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Nos articles - Accueil</h1>
        <p class="lead blog-description">Affichage de tous nos articles</p>
        <h2>Le projet sur <a href='https://github.com/webcf2015/testoo' target="_blank">github</a></h2>
      </div>

      <div class="row">
        <div class="col-sm-12 blog-main">
            <?php
            foreach ($tous AS $valeur) {
                echo "<div class='blog-post'>";
                echo "<h2 class='blog-post-title'>$valeur->letitre</h2>";
                echo "<p>Ecrit le " . $valeur->ladate . " | Par $valeur->lelogin</p>";
                echo "<p>".substr($valeur->letexte,0,300)."... <a href='?page=$valeur->leslug'>lire plus</a></div>";
                echo "<hr/>";

            }
            ?>
        </div>
      </div>
    </div>
    </body>
</html>