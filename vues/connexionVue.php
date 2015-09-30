<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nos articles - Connexion</title>
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
          <a class="blog-nav-item">connexion</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Nos articles - Connexion</h1>
        <p class="lead blog-description">Connexion à l'administration</p>
      </div>

      <div class="row">
        <div class="col-sm-12 blog-main">

                <div class='blog-post'>
                <h2 class='blog-post-title'>Login et password - <?php if(isset($erreur_login)) echo $erreur_login ; ?></h2>
                <form action="" name='con' method="POST">
                    Login : <input type="text" name='lelogin' required /><br/>
                    Pass : <input type="password" name='lepass' required /><br/>
                    <input type="submit" value='se connecter' />
                </form>
        </div>
      </div>
    </div>
    </body>
</html>