<?php
session_start();
$pagetitle= 'Liste des livres';

include 'init.php';


?>
<div class="container">
  <div class="row">
    <h1 class="text-center">- Liste des livres -</h1>
    <?php

    $stmt = $con->prepare("SELECT * FROM book ORDER BY book_id ASC");

    $stmt->execute();

    $books = $stmt->fetchAll();
    foreach ($books as $book1) {
    ?>
    <div class="col-md-5 col-sm-5 item-content">
        <div class="img-content">
          <img src="/etud/admin/assets/upload/<?php echo $book1['image']; ?>" alt="">
        </div>
        <div class="text-content" style="direction: ltr;">
          <h2><a href="#"><?php echo $book1['name']; ?></a></h2>
          <h4>L'auteur :<?php echo $book1['auteur']; ?></h4>
          <h3>L'edition : <?php echo $book1['ledition']; ?></h3>
          <p><?php echo $book1['description']; ?></p>
          <hr>
          <p>résumé : <br><?php echo $book1['resume']; ?></p>
          <h3 style="color: #32aa72;">prix : <?php echo $book1['prix']; ?> da</h3>
        </div>
    </div>
    <?php } ?>

  </div>
</div>

<?php
include "includes/temblates/footer.php"
?>
