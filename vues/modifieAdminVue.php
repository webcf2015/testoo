<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nos articles - <?php echo $recup->letitre ?></title>
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
        <p class="lead blog-description">Modification d'un article</p>
      </div>

      <div class="row">
        <div class="col-sm-12 blog-main">
            <div class='blog-post'>
                <h2 class='blog-post-title'><?php echo $recup->letitre ?></h2>
                <form action="" name='modif' method='POST'>
                    Titre <input type="text" name='mod[letitre]' value="<?php echo $recup->letitre ?>" required /><br/>
                    La date <input type="datetime" name='mod[ladate]' value="<?php echo $recup->ladate ?>" required /><br/>
                    Par <select name="mod[utilisateur_id]" required>
                        <?php
                        foreach($util AS $valeur){
                            $selection = ($valeur->id == $recup->utilisateur_id)? "selected='selected'" : "";
                            echo "<option value='$valeur->id' $selection >$valeur->lelogin</option>";
                        }
                        ?>
                    </select><br/>
           
                    <textarea name='mod[letexte]' required><?php echo $recup->letexte ?></textarea><br/>
                    <input type="submit" value='modifier' />
                </form>
        </div>
      </div>
    </div>
    </body>
</html>