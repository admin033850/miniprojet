<?php

session_start();
$pagetitle= 'book';

if (isset($_SESSION['Username'])){

  include 'init.php';

  $do = isset($_GET['do']) ? $_GET ['do'] :'Manage';

 if ($do == 'Manage') {

              $query = '';

          if (isset($_GET['page']) && $_GET['page'] == 'Pending' ) {

              $query = 'AND StatusReg = 0';

          }



        $stmt = $con->prepare("SELECT * FROM book ORDER BY book_id DESC ");

        $stmt->execute();


        $rows = $stmt->fetchAll();



    ?>

   <h1 class="text-center">manage book</h1>
   <div class="container">
     <div class="table-responsive">
       <table class="main-table text-center table table-bordered">
            <tr>
                  <td>#ID</td>
                  <td>Nom</td>
                  <td>description</td>
                  <td>l'auteur</td>
                  <td>l'edition</td>
                  <td>prix</td>
                  <td>résumé</td>
                  <td>quantité</td>
                  <td>photo</td>
                  <td>Date</td>
                  <td>Control</td>
            </tr>

          <?php foreach ($rows as $row) {
            echo "<tr>";
                  echo "<td>" . $row['book_id'] . "</td>" ;
                  echo "<td>" . $row['name'] . "</td>" ;
                  echo "<td>" . $row['description'] . "</td>" ;
                  echo "<td>" . $row['auteur'] . "</td>" ;
                  echo "<td>" . $row['ledition'] . "</td>" ;
                  echo "<td>" . $row['prix'] . "</td>" ;
                  echo "<td>" . $row['resume'] . "</td>" ;
                  echo "<td>" . $row['qunt'] . "</td>" ;
                  echo "<td>";
                  echo "<img width='40' height='40' src='/etud/admin/assets/upload/" . $row['image'] ."'  alt=''/>" ;
                  echo "</td>";
                  echo "<td>" . $row['date'] ."</td>";
                  echo "<td>

                         <a href='book.php?do=Delete&bookid=" . $row['book_id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";


                echo "</td>";
                echo "</tr>";
          } ?>


       </table>
     </div>
     <a href="book.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Member</a>


   </div>




<?php  }elseif ($do == 'Add') { ?>
   <h1 class="text-center">Add Member</h1>
   <div class="container">
        <form class="form-horizontal" action="?do=Insert"method="POST" enctype="multipart/form-data">

   		<div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">Nom</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="text" name="Nom" class="form-control" autocomplete="off" required="required" placeholder="Nom" />
   			</div>
   		</div>

      <div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">description</label>
   			<div class="col-sm-10 col-md-4">
          <textarea type="text" name="description" class="form-control" autocomplete="off" required="required" placeholder="description" rows="8" cols="80"></textarea>
   			</div>
   		</div>
      <div class="form-group form-group-lg ">
        <label class="col-sm-2 control-label">l'auteur</label>
        <div class="col-sm-10 col-md-4">
          <input type="text" name="auteur" class="form-control" autocomplete="off" required="required" placeholder="l'auteur" />
        </div>
      </div>
      <div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">l'edition</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="text" name="ledition" class="form-control" autocomplete="off" required="required" placeholder="l'edition" />
   			</div>
   		</div>
      <div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">prix</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="text" name="prix" class="form-control" autocomplete="off" required="required" placeholder="prix" />
   			</div>
   		</div>
      <div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">résumé</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="text" name="resume" class="form-control" autocomplete="off" required="required" placeholder="résumé" />
   			</div>
   		</div>
      <div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">photo</label>
   			<div class="col-sm-10 col-md-4">
          <input name="photo" id="exampleFile" type="file" accept=".jpg, .png, .gif" required class="form-control-file">
   			</div>
   		</div>
      <div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">quantité</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="text" name="quantite" class="form-control" autocomplete="off" required="required" placeholder="quantite" />
   			</div>
   		</div>


   		<div class="form-group form-group-lg">
   			<div class="col-sm-offset-2 col-sm-10">
   				<input type="submit" value="Add book" class="btn btn-primary btn-lg">
   			</div>
   		</div>




   	</form>
   </div>


<?php
}elseif ($do == 'Insert') {


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "<h1 class='text-center'>Insert book</h1>";
    echo "<div class='container'>";

      $Nom    = $_POST['Nom'];
      $auteur    = $_POST['auteur'];
      $description    = $_POST['description'];
      $ledition    = $_POST['ledition'];
      $prix    = $_POST['prix'];
      $resume    = $_POST['resume'];
      $quantite    = $_POST['quantite'];


          $imagename        = $_FILES['photo']['name'];
          $imagesize        = $_FILES['photo']['size'];
          $imagetmp         = $_FILES['photo']['tmp_name'];
          $imagetype        = $_FILES['photo']['type'];

          $imageAllowedExtension = array("jpeg", "jpg", "png", "gif");
          $Extension = explode('.', $imagename);
          $imageExtension = strtolower(end($Extension));


$fromErrors = array();
      if (empty($Nom)) {

          $fromErrors[] = 'Name Can\'t Be <strong> empty</strong>';
                }
      if (! empty($imagename) && ! in_array($imageExtension, $imageAllowedExtension)) {
          $fromErrors[ ]= 'This Extension is Not <strong> Allowed</strong>';
              }
              if (empty($imagename) ) {
                $fromErrors[ ]= 'Image is <strong>Required</strong>';
                    }
                    if ($imagesize > 4194304 ) {
                       $fromErrors[ ]= 'Image Cant Be Larger Than <strong> 4Mb</strong>';
                         }



                  foreach ($fromErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                  }

                  if (empty($fromErrors)) {


                    $image = rand(0, 100) . '_' . $imagename;

                    move_uploaded_file($imagetmp, "assets/upload/" . $image);

                    $stmt = $con->prepare(" INSERT INTO
                                              book(name, description, auteur, ledition, prix, resume, image, qunt, Date)
                                              VALUES(:zname, :zdescription, :zauteur, :zledition, :zprix, :zresume, :zimage, :zqunt, now()) ");
                    $stmt->execute(array(

                      'zname' => $Nom,
                      'zdescription' => $description,
                      'zauteur' => $auteur,
                      'zledition' => $ledition,
                      'zprix' => $prix,
                      'zresume' => $resume,
                      'zimage' => $image,
                      'zqunt' => $quantite

                    ));

                    $theMsg = "<div class='alert alert-success' >" . $stmt->rowCount() . ' Record Inserted</div>';
                            redirectHome($theMsg, 'back');

                                  }

  } else {

    echo "<div class='container'>" ;

    $theMsg = '<div class="alert alert-danger">Sorry you cant Browse This page Directly</div>';
    redirectHome($theMsg);
    echo "</div>";
  }

  echo "</div>";

   }elseif ($do == 'Delete') {

  echo "<h1 class='text-center'>Delete Member</h1>";
  echo "<div class='container'>";


  $bookid =isset($_GET['bookid']) && is_numeric($_GET['bookid']) ? intval($_GET['bookid']) : 0;

$check = checkItem('book_id', 'book', $bookid) ;

if ($check > 0) {

     $stmt = $con->prepare("DELETE FROM book WHERE book_id = :zbook");

     $stmt->bindParam(":zbook", $bookid);

     $stmt->execute();
     $theMsg ="<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
     redirectHome($theMsg, 'back');
} else {
  $theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';
redirectHome($theMsg);
}
 echo '</div>';

}
  include 'includes/temblates/footer.php';

} else {
header('Location: index.php');
exit();
}
?>
