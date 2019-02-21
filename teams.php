<?php

$title = 'Teams';
include 'includes/header.php';

include 'admin/includes/db.php';
include 'admin/includes/function.php';
$employee = getAllData($conn,'team');
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


<!-- Section: Teams -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row">
              <?php foreach ($employee as $key => $value) {
                                            // code...
                                          ?>
            <div class="col-sm-6 col-md-4 mb-30">
              <div class="team box-hover-effect effect3 border-1px border-bottom-theme-color-2px sm-text-center maxwidth400 mb-sm-30">
                <div class="thumb"><img class="img-fullwidth" src="admin/<?php echo $value['image'] ?>" alt=""></div>
                <div class="content p-20 text-center">
                  <h4 class="name mb-0 mt-0"><a class="text-theme-colored" href="#"><?php echo $value['name'];  ?></a></h4>
                  <p>Joined <?php echo $value['year'];  ?></p>
                  <p class="mb-20">Faculty Adviser:<br> <?php echo $value['fa1'];  ?><br>
                                                 <?php echo $value['fa2'];  ?><br>
                                                  <?php echo $value['fa3'];  ?></p>
                  <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
                    <li><a href="<?php echo $value['facebook'];  ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php echo $value['twitter'];  ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php echo $value['instagram'];  ?>"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
            </div> 
          
            <?php  }  ?>
            
           
          </div>
        </div>
      </div>
    </section>

<?php

include 'includes/footer.php';

?>