<?php

session_start();
if (!isset($_SESSION['login'])) exit("Debes loguearte para publicar");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../includes/database.php");
  include("../includes/model.php");
  include("../includes/post.php");

  $post = new post();
  $title = $_POST['title'];
  $content = $_POST['content'];
  $valid = true;

  if (empty($title)){
    $valid = false;
    exit("Coloque un titulo");
  }
  if (empty($content)){
    $valid = false;
    exit("Escriba algo en <b>texto</b>");
  }

  if (strlen($title) < 5){
    echo "El titulo debe tener al menos 5 caracteres";
    $valid = false;
  }

  if (strlen($content) < 10){
    echo "Agregue un texto de más de 10 caracteres";
    $valid = false;
  }

  if ($valid){
    $post->content = $content;
    $post->title = $title;
    $post->addPost();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../meta.php"); ?>
</head>
<body>
  <?php include("../header.php"); ?>
  <h1>POST</h1>
  <form method="POST" action="/blog/add-post.php">
    <label>
      Titulo
      <input type="text" name="title"/>
      <br></br>
    </label>
    <br>
    <label>
      Texto
      <textarea name="content"></textarea>
    </label>
    </br>
    <br>
    <button>Publicar</button>
    </br>
  </form>
</body>
</html>