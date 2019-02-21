<?php


							$connect = mysqli_connect("localhost", "root", "", "enactuso_enactusweb");

							$record_per_page = 12;
							$page = '';
							$output = '';


							if(isset($_POST["page"]))
							{

								$page = $_POST["page"];
							}
							else
							{
								$page = 1;
							}
								$start_from =($page - 1) * $record_per_page;

								$query = "SELECT * FROM alumni ORDER BY id DESC LIMIT $start_from, $record_per_page";


								$result = mysqli_query($connect, $query);

								while ($row = mysqli_fetch_array($result)) {
							
							?>
                <div class="col-md-6">
              <article class="post clearfix mb-30 bg-lighter">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="admin/<?php echo $row['image']; ?>" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10">
                  <div class="entry-meta media mt-0 no-bg no-border">
                   <!-- <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600">28</li>
                        <li class="font-12 text-white text-uppercase">Feb</li>
                      </ul>
                    </div>-->
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#"><?php echo $row['name'];  ?></a></h4>
                       <!-- <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>                       
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>   -->                    
                      </div>
                    </div>
                  </div>
                  <p class="mt-10"><?php
                    $desc = $row['editor1'];
                  $strcut = substr($desc,0,410);
              $desc = substr($strcut,0,strrpos($strcut, ' ')).' <a href="alumniProfile.php?sid='.$row[0].'" class="btn-read-more"><br> Read More</a>';
                        echo $desc;
                 
                 ?></p>
                
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>

                <?php  } ?>

                <div class="col-md-12">
              <nav>
                <ul class="pagination theme-colored">
<?php	

		$page_query = "SELECT * FROM alumni ORDER BY id DESC";
		$page_result = mysqli_query($connect, $page_query);
		$total_records = mysqli_num_rows($page_result);
		$total_pages = ceil($total_records/$record_per_page);
		

		for ($i=1; $i <=$total_pages ; $i++) { 

			echo "<li><span class='pagination_link bg-theme-colored text-white' style='cursor:pointer; padding:10px; border:1px;' id='".$i."'>".$i."</span></li>";
		
		}
		?>
			</ul>
              </nav>
            </div>

					