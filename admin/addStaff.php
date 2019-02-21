<?php
ob_start();
session_start();
include 'includes/db.php';
include 'includes/function.php';
include 'includes/authentication.php';
include ("includes/header.php");


$error = [];
if(array_key_exists('submit', $_POST)){

  $ext = ["image/jpg", "image/JPG", "image/jpeg", "image/JPEG", "image/png", "image/PNG"];

  if(empty($_FILES['upload']['name'])){
    $error['upload'] = "Please choose file";
  }
  if(!in_array($_FILES['upload']['type'], $ext)){
    $error['upload'] = " Please Upload Staffs picture";
  }
  if(empty($_POST['name'])){
    $error['name']="Enter a name";
  }

  if(empty($_POST['position'])){
    $error['year']="cannot be empty";
  }

  if(empty($_POST['email'])){
    $error['email']="cannot be empty.";
  }


  

  if(empty($error)){
    $ver['a'] = compressImage($_FILES,'upload',90, 'uploads/' );
    // die($ver['a']);

      //$new['type'] = 1;
        $new['image'] = $ver['a'];
      $post = $new + $_POST ;
    insert($conn, 'staff', $post);
    $message = "Successfull added";
  header("Location:viewStaffs.php?success=$message");

}
}
?>

<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Staffs</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Add Staffs</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                  <?php if (isset($_GET['success'])){
                  $msg = $_GET['success'];

                    echo '<div class="col-md-12">
                  <div class="inner-box posting">
                  <div class="alert alert-success alert-lg" role="alert">
                  <h2 class="postin-title">✔ Successfull! '.$msg.' </h2>
                  <p>Thank you</p>
                  </div>
                  </div>
                  </div>';
                  } ?>
                  <?php if (isset($_GET['error'])){
                  $msg = $_GET['error'];

                    echo '<div class="col-md-12">
                  <div class="inner-box posting">
                  <div class="alert alert-danger alert-lg" role="alert">
                  <h2 class="postin-title">error! '.$msg.' </h2>

                  </div>
                  </div>
                  </div>';
                  } ?>
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">New Staff</h3>

                        </div>
<form class="needs-validation" action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Name</label>
      <div class="text-danger">
        <?php $display = displayErrors($error, 'name');
        echo $display ?>
      </div>
      <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Team name" value="" required>

    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Position</label>
      <div class="text-danger">
        <?php $display = displayErrors($error, 'position');
        echo $display ?>
      </div>
      <input type="text" name="position" class="form-control" id="validationCustom02" placeholder="position " value="">

    </div>

  </div>
  <div class="form-row">

    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Email</label>
        <input type="email" name="email" class="form-control" id="validationCustom03" placeholder="Email" required>

    </div>

<div class="col-md-6 mb-3">
      <label for="validationCustom03">Facebook</label>
        <input type="text" name="facebook" class="form-control" id="validationCustom03" placeholder="Facebook" required>

    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Twitter</label>
        <input type="text" name="twitter" class="form-control" id="validationCustom03" placeholder="Twitter" required>

    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Instagram</label>
        <input type="text" name="Instagram" class="form-control" id="validationCustom03" placeholder="Instagram" required>

    </div>

     <div class="col-md-6 mb-3">
      <?php $display = displayErrors($error, 'img');
          echo $display ?>
      <label for="validationCustom03">Picture</label>
        <input type="file" name="upload"  placeholder="Logo" required>
<br>
<input class="btn btn-primary text-center" type="submit" name="submit" value="Submit form">

    </div>
    
    

    

  </div>
 
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->


<?php

include ("includes/footer.php");

?>
