<?php
ob_start();
session_start();
if (isset($_SESSION['Username'])){

    $pagetitle= 'Dashbord';

    include 'init.php';

    $latestUsers = 10;

$theLatest = getLatest("*", "users", "userID", $latestUsers);
$thebook = getLatest("*", "book", "book_id", $latestUsers);
?>



<div class=" home-stats">
    <div class="container text-center">
          <div class="row">
            <div class="col-md-6">
              <div class="stat st-members">
                <i class="fa fa-users"></i>
                <div class="info">
                Total Members
                <span><a href="members.php?do=Manage"><?php echo countItems('userID', 'users') ?></a></span>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="stat st-items">
                <i class="fa fa-book"></i>
                <div class="info">
                  Total livres
                  <span><a href="book.php?do=Manage"><?php echo countItems('book_id', 'book') ?></a></span>
                </div>
              </div>
            </div>
         </div>
    </div>
</div>

<div class="latest">
    <div class="container latest">
          <div class="row">
          <div class="col-sm-6">
              <div class="panel panel-Default">

                <div class="panel-heading">
                  <i class="fa fa-users"></i>Les derniers membres inscrits
                  </div>
                  <div class="panel-body">
                    <ul class="list-unstyled lastest-users" style="direction: rtl;">
                      <?php
                      foreach ($theLatest as $user) {
                      echo '<li>';
                      echo $user['username'];
                      echo '</li>';
                      }
                       ?>
                     </ul>
                    </div>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-Default">
                  <div class="panel-heading">
                    <i class="fa fa-tag"></i> Derniers livres

                    </div>
                    <div class="panel-body">
                      <ul class="list-unstyled lastest-users" style="direction: rtl;">
                        <?php
                        foreach ($thebook as $books) {
                        echo '<li>';
                        echo $books['name'];
                        echo '</li>';
                        }
                         ?>
                       </ul>
                      </div>
                </div>
              </div>
         </div>
    </div>
</div>








<?php
 include 'includes/temblates/footer.php';

} else {
header('Location: index');
exit();
}
ob_end_flush();
?>
