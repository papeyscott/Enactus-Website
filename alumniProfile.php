<?php

$title = 'Alumnus Profile';
include 'includes/header.php';
include 'admin/includes/db.php';
include 'includes/functions.php';

  if (isset($_GET['sid'])) {
  $sfid = $_GET['sid'];
}

$item = Utils::getCampusByID($conn, $sfid);


?>
<!-- Section: Blog -->
    <?php 
              $stmt = $conn->prepare("SELECT * FROM alumni WHERE id=:stid ");
              $stmt->bindParam(':stid', $sfid);

              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                ?>
 <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                <div class="entry-header">
                  <div class="post-thumb thumb"> <img src="admin/<?php echo $row['image']; ?>" alt="" class="img-responsive img-fullwidth"> </div>
                </div>
                <div class="entry-content">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                  <!--  <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600">28</li>
                        <li class="font-12 text-white text-uppercase">Feb</li>
                      </ul>
                    </div>-->
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0"><a href="#"><?php echo $row['name']; ?></a></h4>
                   <!--     <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>                       
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>-->
                      </div>
                    </div>
                  </div>
                  <p class="mb-15"> <?php echo $row['editor1']; ?> </p>
           <!--       <div class="mt-30 mb-0">
                    <h5 class="pull-left mt-10 mr-20 text-theme-colored">Share:</h5>
                    <ul class="styled-icons icon-circled m-0">
                      <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                    </ul>
                  </div> -->
                </div>
              </article>
             
             
     <!--          <div class="comments-area">
                <h5 class="comments-title">Comments</h5>
                <ul class="comment-list">
                  <li>
                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment1.jpg" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                        <div class="comment-date">23/06/2014</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                        <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                    </div>
                  </li>
                
                 
                </ul>
              </div>
             <div class="comment-box">
                <div class="row">
                  <div class="col-sm-12">
                    <h5>Leave a Comment</h5>
                    <div class="row">
                      <form role="form" id="comment-form">
                        <div class="col-sm-6 pt-0 pb-0">
                          <div class="form-group">
                            <input type="text" class="form-control" required name="contact_name" id="contact_name" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <input type="text" required class="form-control" name="contact_email2" id="contact_email2" placeholder="Enter Email">
                          </div>
                          
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <textarea class="form-control" required name="contact_message2" id="contact_message2"  placeholder="Enter Message" rows="7"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </section>



  <?php } ?>


<?php

include 'includes/footer.php';

?>