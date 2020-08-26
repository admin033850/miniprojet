<?php

include 'connect.php';



if(isset($_POST["Div_id"]) && !empty($_POST["Div_id"])){

$div = $_POST["Div_id"];

  $stmt2 = $con->prepare("SELECT* FROM module WHERE id_div ='$div'");
  $stmt2->execute();
  $cats = $stmt2->fetchAll();
   $count = $stmt2->rowCount();



   if($count > 0){
       echo '<option value="">Select state</option>';
       foreach ($cats as $cat) {
         echo "<option value='" . $cat['module_id'] . "'>" . $cat['name_module'] . "</option>";
       }
   }else{
       echo '<option value="">State not available</option>';
   }
}





 ?>
