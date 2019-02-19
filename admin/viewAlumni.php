<?php
ob_start();
session_start();
include 'includes/authentication.php';
include 'includes/db.php';
include 'includes/function.php';
include ("includes/header.php");
$employee = getAllData($conn,'alumni');
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
                        <h4 class="page-title">Alumni Log</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Alumni Log</li>
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
                        <a href="AddAlumni.php">

                            <div class="white-box" style="background-color: #95e297">
                            <h3 class="box-title text-center"><strong style="font-size: 25px;"> ADD Alumni </strong></h3>

                        </div>
                        </a>
                    </div>

                </div>
                <!--/.row -->

                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Alumni Log</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Picture</th>
                                            <th><a href="profile.php">Name</a></th>
                                            <th>Email</th>
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
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['email'] ?></td>
                                            <td><?php echo $value['editor1'] ?></td>

                                            <!-- <th>Date</th> -->
                                            <?php $urii = explode("/", $_SERVER['REQUEST_URI']);
                                              $retUrl = end($urii); ?>
                                             <td> <a href="alumniProfile.php?tdata=alumni&vdata=<?php echo $value['id'] ?>&ret=<?php echo $retUrl ?>">  <i class="btn btn-warning fa fa-pencil" aria-hidden="true"></i></a></td>
                                              <td><a href="delete.php?tdata=alumni&vdata=<?php echo $value['id'] ?>&ret=<?php echo $retUrl ?>"><i class="btn btn-danger fa fa-trash" aria-hidden="true"></i></a></td>
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
