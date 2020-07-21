<?php

if ($_SERVER['REQUEST_METHOD'] = 'GET') {
    include("../includes/database.php");
    include("../includes/model.php");
    include("../includes/post.php");

    $post = new post();

    if (empty($_GET['id'])) exit("Invalid request");

    $postID = $_GET['id'];
    $postData = $post->getById($postID);
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
        </section>
  </div>
</body>
</html>