<?php
//include("../includes/edit-post.php");
include("../includes/model.php");
include("../includes/user.php");
include("../includes/database.php");
include("../includes/post.php");
session_start();

$post = new post();
$valid = true;

if (!isset($_SESSION['login'])) exit("Inicia sesion para publicar");
if ($_SESSION['is_admin'] == false) exit("Admins Only");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (empty($_GET['id'])) exit("Invalid request");

  //$postID = $_GET['id'];
 // $postData = $post->getById($postID);
}

$postID = $_GET['id'];
$postData = $post->getById($postID);

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $title = $_POST['title'];
  $content = $_POST['content'];
  
  if (empty($title)){
    $valid = false;
    exit("Coloque un titulo");
  }
  if (empty($content)){
    $valid = false;
    exit("Escriba algo en <b>texto</b>");
  }

  if (strlen($title) < 2){
    echo "El titulo debe tener al menos 2 caracteres";
    $valid = false;
  }

  if (strlen($content) < 4){
    echo "Agregue un texto de más de 4 caracteres";
    $valid = false;
  }

  if ($valid){
    $post->content = $content;
    $post->title = $title;
    $post->editPost($postID);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  include("../meta.php"); ?>
</head>
<body>
  <?php include("../header.php"); ?>
  <h1>EDITAR POST</h1>
  <form method="POST" action="/blog/edit-post.php?id=<?= $postID ?>">
  <div class="container is-fluid">
  <sec  ti  on class="section">
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
    <input class="button" type="submit" value="Editar"></input>
    </br>
    </setion>
  </form>
</body>
</html>