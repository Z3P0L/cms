<?php

include("../includes/database.php");
include("../includes/model.php");
include("../includes/post.php");

$view = new post();
$posts = $view->getAll();
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
            <?php if ($posts !== NULL): ?>
            <?php $view->renderPosts($posts); ?>
            <?php else: ?>
            <h2>No hay publicaciones todavia</h2>
            <?php endif; ?>
        </section>
  </div>
</body>
</html>