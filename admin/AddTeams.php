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
    $error['upload'] = " Please Upload teams logo";
  }
  if(empty($_POST['name'])){
    $error['name']="Enter a name";
  }

  if(empty($_POST['year'])){
    $error['year']="What year did the team join";
  }

  if(empty($_POST['fa1'])){
    $error['fa1']="who is the principal faculty advisor";
  }


  

  if(empty($error)){
    $ver['a'] = compressImage($_FILES,'upload',90, 'uploads/' );
    // die($ver['a']);

      $new['type'] = 1;
        $new['image'] = $ver['a'];
      $post = $new + $_POST ;
    insert($conn, 'team', $post);
    $message = "Successfull added";
  header("Location:viewTeams.php?success=$message");

}
}
?>

<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Teams</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Add Teams</li>
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
                            <h3 class="box-title">New Team</h3>

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
      <label for="validationCustom02">Year Joined</label>
      <div class="text-danger">
        <?php $display = displayErrors($error, 'year');
        echo $display ?>
      </div>
      <input type="text" name="year" class="form-control" id="validationCustom02" placeholder="Year Joined" value="">

    </div>

  </div>
  <div class="form-row">

    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Faculty Adviser 1</label>
        <div class="text-danger">
          <?php $display = displayErrors($error, 'fa1');
          echo $display ?>
        </div>
      <input type="text" name="fa1" class="form-control" id="validationCustom03" placeholder="Faculty Adviser 1" required>

    </div>

    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Faculty Adviser 2</label>
          <input type="text" name="fa2" class="form-control" id="validationCustom03" placeholder="Faculty Adviser 2" required>

    </div>

    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Faculty Adviser 3</label>
        <input type="text" name="fa3" class="form-control" id="validationCustom03" placeholder="Faculty Adviser 3" required>

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
      <label for="validationCustom03">Logo</label>
        <input type="file" name="upload"  placeholder="Logo" required>

    </div>
    
    

    

  </div><br><br><br>
  <div class="text-center">
    <input class="btn btn-primary text-center" type="submit" name="submit" value="Submit form">
          <!-- <button  type="submit">Submit form</button> -->
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
