<?php
ob_start();
session_start();
include 'includes/db.php';
include 'includes/function.php';
 include 'includes/authentication.php';
include ("includes/header.php");

$visitor = getSpecificData($conn,$_GET['tdata'],'id',$_GET['vdata']);
$error = [];
if (array_key_exists('update', $_POST)) {
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
  

    $clean = array_map('trim', $_POST);
  $new['id'] = $_GET['vdata'];
    update($conn,'team',$clean,'id',$new,$_GET['ret']);
     $message = "Successfull updated";
  header("Location:viewTeams.php?success=$message");
}

}
?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Teams Profile</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Teams Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <?php foreach ($visitor as $key => $value) {
                  // code...
              ?>
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
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="styles/plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo $value['image'] ?>" class="thumb-lg img-circle" alt="img"></a>
                                        
                                     
                                        <h4 class="text-white"><?php echo $value['name'] ?></h4>
                                        <h5 class="text-white"><?php echo $value['year'] ?></h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1><?php echo $value['year'] ?></h1> </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form action="" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe" name="name" class="form-control form-control-line" value="<?php echo $value['name'] ?>">  </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Year Joined</label>
                                    <div class="col-md-12">
                                        <input type="text"  name="year" value="<?php echo $value['year'] ?>" class="form-control form-control-line"  id="example-email"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Faculty Advisor 1</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" name="fa1" value="<?php echo $value['fa1'] ?>"> </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-md-12">Faculty Advisor 2</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" name="fa1" value="<?php echo $value['fa2'] ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Faculty Advisor 3</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" name="fa1" value="<?php echo $value['fa3'] ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Facebook</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" name="facebook" value="<?php echo $value['facebook'] ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Twitter</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" name="twitter" value="<?php echo $value['twitter'] ?>"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Instagram</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" name="instagram" value="<?php echo $value['instagram'] ?>"> </div>
                                </div>
                                
                                


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <!-- <button class="btn btn-success"></button> -->
                                        <input class="btn btn-success" type="submit" name="update" value="Update Profile">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              <?php } ?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php

            include ("includes/footer.php");

            ?>
