<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nos articles - <?php echo $un->letitre ?></title>
        <link href="vues/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="vues/bootstrap3.3.5/blog.css" rel="stylesheet">
        <script src="vues/bootstrap3.3.5/jquery-2.1.4.min.js"></script>
        <script src="vues/bootstrap3.3.5/js/bootstrap.min.js"></script>
        
    </head>
    <body>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="./">Accueil</a>
          <a class="blog-nav-item" href="?connect">connexion</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Nos articles</h1>
        <p class="lead blog-description">Affichage d'un article</p>
      </div>

      <div class="row">
        <div class="col-sm-12 blog-main">
            <?php

                echo "<div class='blog-post'>";
                echo "<h2 class='blog-post-title'>$un->letitre</h2>";
                echo "<p>Ecrit le " . $un->ladate . " | Par $un->lelogin</p>";
                echo "<p>$un->letexte</div>";
                echo "<hr/>";


            ?>
        </div>
      </div>
    </div>
    </body>
</html>