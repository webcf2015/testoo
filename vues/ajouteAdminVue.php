<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nos articles - Ajout</title>
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
          <a class="blog-nav-item" href='?deco'>déconnexion</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Nos articles</h1>
        <p class="lead blog-description">Ajout d'un article</p>
        
      </div>

      <div class="row">
        <div class="col-sm-12 blog-main">
            <div class='blog-post'>
                <h2 class='blog-post-title'>Ajout d'un article</h2>
                <form action="" name='met' method='POST'>
                    Titre <input type="text" name='met[letitre]' value="" required /><br/>
                    La date <input type="datetime" name='met[ladate]' value="<?php echo $heure ?>" required /><br/>
                    <input type='hidden' name="met[utilisateur_id]" value='<?php echo $_SESSION['id'];?>'>
           
                    <textarea name='met[letexte]' required></textarea><br/>
                    <input type="submit" value='ajouter' />
                </form>
        </div>
      </div>
    </div>
    </body>
</html>