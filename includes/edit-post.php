<!DOCTYPE html>
<html lang="en">
<head>
<?php  include("../meta.php"); ?>
</head>
<body>
  <?php include("../header.php"); ?>
  <h1>POST</h1>
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