<?php
session_start();
include('includes/config.php');
include('partials/layout-pre.php');


$errormsg = [];


function encrypt_decrypt($action, $string) {
   $output = false;
 
   $encrypt_method = "AES-256-CBC";
   $secret_key = 'X*T9B@786#!qwN';
   $secret_iv = 'V)*12qZesxd%^jK';
 
   // hash
   $key = hash('sha256', $secret_key);
   
   // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
   $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
   if ( $action == 'encrypt' ) {
     $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
     $output = base64_encode($output);
   } else if( $action == 'decrypt' ) {
     $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
   }
   else{
     
   }
   return $output;
}





if(isset($_POST['emailid'])){

   $update = $con->query("UPDATE tbl_users SET password = $cryptedpwd, name = ".$_POST['name']." WHERE emailid = ".$_POST['emailid']." ");

   if( strlen( $_POST['emailid'] ) > 3 ){

      //process post variables
      $emailid = $_POST['emailid'];
      $password = mysqli_real_escape_string($con, trim($_POST['password']));
      $cryptedpwd = encrypt_decrypt('encrypt', $password);
      $resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND isclosed = '0' ");
      //echo "SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ";
      //check if the user exists as well as email verified flag is set
      if(mysqli_num_rows($resdup2) > 0){
         while($row = mysqli_fetch_array($resdup2)){
         
            if( count($row) == 0 )
            {

               $errormsg[] = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>User was not found.</div>";

            }

            

            if( strlen($_POST['new_password']) > 0 )
            {

               if( $_POST['new_password'] != $_POST['repeat_new_password'] )
               {

                  $errormsg[] = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>New password and repeat password did not match.</div>";

               } else{

                  $password = mysqli_real_escape_string($con, trim($_POST['new_password']));

                  $cryptedpwd = encrypt_decrypt('encrypt', $password);

               }

            }

            

            if( count($errormsg) == 0 )
            {

               if( $con->query("UPDATE `tbl_users` SET `password` = $cryptedpwd, `name` = '".$_POST['name']."' WHERE `emailid` = '".$_POST['emailid']."';") )
               {

                  $errormsg[] = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data updated successfully.</div>";

               }

            }
         }
      }
      else
      {
      //user does not exist or email verified flag is not set yet
      $errormsg[] = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>The email or password you have entered is incorrect. Please try again.</div>";
      }

   }
}


?>

<section class="row m-0 p-0">
  <section class="col-12 m-0 p-0">
      <div class="cover about text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4">SETTINGS</h1>
      </div>
  </section>
</section>




<section class="row mx-0 p-0 mb-sm-5 d-flex justify-content-center">
  <section class="col-12 col-sm-6 m-0 p-0">

      <!-- START -->
      <div class="card shadow py-5 px-3 my-5" >
         <div class="card-body">

            <form role="form" name="myform" id="idForm" method="POST" class="d-flex" autocomplete='off' >
               
               <div class="col-12 mb-4">

                  <div class="log-inpart-sec">
                  <?php
                     if( count($errormsg) > 0 ){
                        foreach( $errormsg as $e ){
                           echo($e);
                        }
                     } 
                  ?>
                  <div class="form-group apj_update_form">
               </div>

               <div class="col-12 mb-4">

                  <label for="name" class="">Name</label>
                  <input type="text" class="form-control" placeholder="Name" id="name"  value="<?php echo $_SESSION['first_name']; ?>" name="name" required>
                  </div>
               </div>

               <div class="col-12 mb-4">
                  <div class="form-group apj_update_form">
                  <label for="emailid" class="">Email</label>
                     <input type="text" class="form-control updateprofile_emailid" placeholder="Email" value="<?php echo $_SESSION['emailid']; ?>" id="emailid"  name="emailid" readonly>
                  </div>
               </div>

               <div class="col-12 mb-4">
                  <div class="form-group apj_update_form">
                     <label for="password" class="">Current Password</label>
                     <input type="password" autocomplete='off' class="form-control" placeholder="Password"  value="<?php echo $_SESSION['password']; ?>"  id="password" name="password" required>
                  </div>
               </div>

               <div class="col-12 mb-4">
                  <div class="form-group apj_update_form">
                     <label for="password" class="">New Password</label>
                     <input type="password" class="form-control" placeholder="New Password"  value=""  id="new_password" name="new_password" >
                  </div>
               </div>

               <div class="col-12 mb-4">
                  <div class="form-group apj_update_form">
                     <label for="password" class="">Confirm New Password</label>
                     <input type="password" class="form-control" placeholder="Repeat New Password"  value=""  id="repeat_new_password" name="repeat_new_password" >
                  </div>
               </div>

               <div class="col-12 mb-4">

                  
                     <div class="checkbox-container circular-container" style="margin-top: 20px;">
                        <label class="checkbox-label" for="isclosed">
                           <input type="checkbox" id="isclosed" name="isclosed">
                           <span class="checkbox-custom circular"></span>
                        </label>
                        <label class="form-check-label" for="isclosed" style="font-size: 17px;">Deactivate Account</label>
                     </div>
                  
               </div>

               <div class="col-12">
                  
                  <div class="full submit-center-xs">
                     <button class="btn btn-info btn-lg square-border" name="sub" id="sub"> Update </button>
                     <a class="btn logdv blueBtnBig blue-border mt-30 mb-30" href="dashboard.php"> Cancel </a>
                  </div>
               </div>

            </form>

         </div>
      </div>
      <!-- END -->

   </section>
</section>

<script>
$(document).ready(function(){
   $('input[type="password"]').val("")
})
</script>

<?php
include('partials/layout-post.php');
?>