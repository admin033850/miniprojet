<?php

session_start();
$pagetitle= 'Members';

if (isset($_SESSION['Username'])){

  include 'init.php';

  $do = isset($_GET['do']) ? $_GET ['do'] :'Manage';

 if ($do == 'Manage') {

              $query = '';

          if (isset($_GET['page']) && $_GET['page'] == 'Pending' ) {

              $query = 'AND StatusReg = 0';

          }



        $stmt = $con->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE GroupID !=1 $query ORDER BY userID DESC ");

        $stmt->execute();


        $rows = $stmt->fetchAll();



    ?>

   <h1 class="text-center">manage Members</h1>
   <div class="container">
     <div class="table-responsive">
       <table class="main-table text-center table table-bordered">
            <tr>
                  <td>#ID</td>
                  <td>Nom</td>
                  <td>Date</td>
                  <td>Control</td>
            </tr>
          <?php foreach ($rows as $row) {
            echo "<tr>";
                  echo "<td>" . $row['userID'] . "</td>" ;
                  echo "<td>" . $row['username'] . "</td>" ;
                  echo "<td>" . $row['Date'] ."</td>";
                  echo "<td>

                         <a href='members.php?do=Delete&userid=" . $row['userID'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";


                echo "</td>";
                echo "</tr>";
          } ?>


       </table>
     </div>
     <a href="members.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Member</a>
  

   </div>




<?php  }elseif ($do == 'Add') { ?>
   <h1 class="text-center">Add Member</h1>
   <div class="container">
   	<form class="form-horizontal" action="?do=Insert"method="POST">

   		<div class="form-group form-group-lg ">
   			<label class="col-sm-2 control-label">Username</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="text" name="username" class="form-control" autocomplete="off" required="required" placeholder="Username" />
   			</div>
   		</div>


   	<div class="form-group form-group-lg">
   			<label class="col-sm-2 control-label">password</label>
   			<div class="col-sm-10 col-md-4">
   				<input type="password" name="password" class="password form-control" autocomplete="new-password" required="required" placeholder="password" />
      	</div>
   		</div>

   		<div class="form-group form-group-lg">
   			<div class="col-sm-offset-2 col-sm-10">
   				<input type="submit" value="Add Member" class="btn btn-primary btn-lg">
   			</div>
   		</div>




   	</form>
   </div>


<?php
}elseif ($do == 'Insert') {


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "<h1 class='text-center'>Insert Member</h1>";
    echo "<div class='container'>";

      $user    = $_POST['username'];
      $pass    = $_POST['password'];


      $hashPass = sha1($_POST['password']);


        $fromErrors = array();

          if (strlen($user) < 4) {

              $fromErrors[] = 'Username Cant Be Less Then<strong> 4 Characters</strong>';
                    }

                    if (strlen($user) > 20) {

                        $fromErrors[] = 'Username Cant Be More Then <strong>20 Characters</strong>';
                              }

      if (empty($user)) {
        $fromErrors[ ]= 'Username Cant Be <strong>Empty</strong>';
            }

      if (empty($pass)) {
        $fromErrors[ ]= 'password Cant Be <strong>Empty</strong>';
            }


                  foreach ($fromErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                  }

                  if (empty($fromErrors)) {

                     $check = checkItem("username", "users", $user);

                     if ($check == 1) {
                       $theMsg = '<div class="alert alert-danger">Désolé, ce nom est déjà enregistrév</div>';
                               redirectHome($theMsg, 'back');
                     }else{

                    $stmt = $con->prepare(" INSERT INTO
                                              users(username, password, Date)
                                              VALUES(:zuser, :zpass, now()) ");
                    $stmt->execute(array(

                      'zuser' => $user,
                      'zpass' => $hashPass

                    ));

                    $theMsg = "<div class='alert alert-success' >" . $stmt->rowCount() . ' Record Inserted</div>';
                            redirectHome($theMsg, 'back');
                        }
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


  $userid =isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

$check = checkItem('userid', 'users', $userid) ;

if ($check > 0) {

     $stmt = $con->prepare("DELETE FROM users WHERE userID = :zuser");

     $stmt->bindParam(":zuser", $userid);

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
