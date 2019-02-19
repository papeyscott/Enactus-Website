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
  if(empty($_POST['title'])){
    $error['title']="Enter a name";
  }

  if(empty($_POST['editor1'])){
    $error['editor1']="cannot be empty.";
  }

  


if(empty($error)){
  

    $clean = array_map('trim', $_POST);
  $new['id'] = $_GET['vdata'];
    update($conn,'campus',$clean,'id',$new,$_GET['ret']);
     $message = "Successfull updated";
  header("Location:viewCampus.php?success=$message");
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
                        <h4 class="page-title">Campus Activities</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Campus Activities</li>
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
                                        
                                     
                                        <h4 class="text-white"><?php echo $value['title'] ?></h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form action="" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" name="title" class="form-control form-control-line" value="<?php echo $value['title'] ?>">  </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-12">Story</label>
                                    <div class="col-md-12">
                                      <textarea name="editor1"><?php echo $value['editor1'] ?></textarea>
                                    </div>
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
