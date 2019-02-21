<?php

$title = 'Staff';
include 'includes/header.php';

include 'admin/includes/db.php';
include 'admin/includes/function.php';
$employee = getAllData($conn,'staff');
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

<!-- Section: volunteers -->
    <section id="team" class="bg-silver-light">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="text-uppercase line-bottom-center mt-0"><span class="text-theme-colored font-weight-600">COUNTRY OFFICE STAFF</span></h2>
              <div class="title-icon">
                <i class="flaticon-charity-hand-holding-a-heart"></i>
              </div>
              <p>Enactus Nigeria operations are managed by a team of highly dedicated, acountable and dynamic people who are committed to developing the next generation of values driven leaders who are able to take entreprenuerial action towards creating a better and more sustainable world. </p>                       

            </div>
          </div>
        </div>
        <div class="section-content">

          <div class="row">
             <?php foreach ($employee as $key => $value) {
                                            // code...
                                          ?>
<div class="col-md-6">
            <div class="product">
              <div class="col-md-7">
                <div class="product-image">
                  <div class="zoom-gallery">
                   <img src="admin/<?php echo $value['image'] ?>" height"50" width"50">
                  </div>
                </div>
              </div>
              <br>
              <div class="col-md-5">
                <div class="product-summary">
                  <h2 class="product-title"><?php echo $value['name'] ?></h2>
                
                  
                  <div class="tags"><strong> <?php echo $value['position'];  ?></strong></div>
                  
                  <div class="category"><strong> <a href="mailto:<?php echo $value['email'];  ?>"><?php echo $value['email'];  ?></a></strong></div>
                  <ul class="styled-icons icon-circled icon-theme-colored" >
                    <li><a href="<?php echo $value['facebook'];  ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php echo $value['twitter'];  ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php echo $value['instagram'];  ?>"><i class="fa fa-instagram"></i></a></li>

                    <li><a href="<?php echo $value['linkedin'];  ?>"><i class="fa fa-linkedin"></i></a></li>

                 </ul>
                </div>
              </div>
             
            </div>
            </div>
            <?php } ?> 
          </div>
          
        </div>
      </div>   
    </section>


<?php

include 'includes/footer.php';

?>