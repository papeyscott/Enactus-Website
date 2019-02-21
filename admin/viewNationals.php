<?php
ob_start();
session_start();
include 'includes/authentication.php';
include 'includes/db.php';
include 'includes/function.php';
include ("includes/header.php");
$employee = getAllData($conn,'nationals');
//for serial numbering;
$dev = [];
for($var=1;  $var <= count($employee); $var++  ){
 // echo $var;
 $dev[$var] = $var;
}
$deb['num'] = $dev;


//rewriting array
$newArray = array();
$i=1;
foreach($employee as $value){
  $newArray[$i] = $value;
  $newArray[$i]['sn'] = $deb["num"][$i];
  $i++;
}
//populating with rewritten array
$employee = $newArray;
// var_dump($newArray);
// die;

?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">National Competiton Log </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">National Competiton Log </li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->
                <div class="row">
                  <?php if (isset($_GET['success'])){
                  $msg = $_GET['success'];

                    echo '<div class="col-md-12">
                  <div class="inner-box posting">
                  <div class="alert alert-success alert-lg" role="alert">
                  <h2 class="postin-title">'.$msg.' </h2>
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
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="addNationals.php">

                            <div class="white-box" style="background-color: #95e297">
                            <h3 class="box-title text-center"><strong style="font-size: 25px;"> ADD National Competiton </strong></h3>

                        </div>
                        </a>
                    </div>

                </div>
                <!--/.row -->

                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">National Competiton Log</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Picture</th>
                                            <th><a href="profile.php">Title</a></th>
                                            
                                            <th>Story</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                          <?php foreach ($employee as $key => $value) {
                                            // code...
                                          ?>
                                          <tr>
                                            <td><?php echo $value['sn'] ?></td></td>
                                            <td><img src="<?php echo $value['image'] ?>" height="50" width="50"></td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><?php
                                                    $desc = $value['editor1'];
                                                  $strcut = substr($desc,0,100);
                                              $desc = substr($strcut,0,strrpos($strcut, ' ')).'...';
                                                  echo $desc;
                                                  
                                                 ?></td>

                                            <!-- <th>Date</th> -->
                                            <?php $urii = explode("/", $_SERVER['REQUEST_URI']);
                                              $retUrl = end($urii); ?>
                                             <td> <a href="nationalsProfile.php?tdata=nationals&vdata=<?php echo $value['id'] ?>&ret=<?php echo $retUrl ?>">  <i class="btn btn-warning fa fa-pencil" aria-hidden="true"></i></a></td>
                                              <td><a href="delete.php?tdata=nationals&vdata=<?php echo $value['id'] ?>&ret=<?php echo $retUrl ?>"><i class="btn btn-danger fa fa-trash" aria-hidden="true"></i></a></td>
                                                </tr>
                                            <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
<?php

include ("includes/footer.php");

?>
