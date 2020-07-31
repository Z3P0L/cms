<?php
include("../includes/database.php");
include("../includes/model.php");
include("../includes/post.php");
session_start();

$post = new post();
$view = $post->getAll();
$valid = true;

if ($_SERVER['REQUEST_METHOD'] = 'GET') {

  if (empty($_GET['id'])) exit("Invalid request");

  $postID = $_GET['id'];
  $postData = $post->getById($postID);

}

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
  $deletePost = $_POST['delete'];
  
  if (empty($deletePost)) $valid = false;
  if ($valid) {
    $post->deletePost($postID);
    header("Location: site.php");
  }
}
?>
<!DOCTYPE html><html lang="en">
<head>
<?php include("../meta.php"); ?>
</head>
<body>
<?php include("../header.php"); ?>
  <div class="container is-fluid">
        <section class="section">
            <h1>Publicaciones</h1>
            <?php if ($postData !== NULL): ?>
            <?php $post->renderPost($postData); ?>
            <?php else: ?>
            <h2>No se encontro el post</h2>
            <?php endif; ?>
            <?php if ($_SESSION['is_admin'] === true): ?>
            <form method="POST" action="post.php?id=<?= $postID ?>"> <br></br>
              <a button class="button" href="edit-post.php?id=<?= $postID ?>">Editar</a>
              <?php echo '<input class="button" name="delete" type="submit" value="Eliminar"></input>'; ?>
            </form>
            <?php endif; ?>
        </section>
  </div>
</body>
</html>