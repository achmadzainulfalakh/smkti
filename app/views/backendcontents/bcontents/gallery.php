<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<div class="content">
            <div class="container-fluid">-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        	<div class="row text-center">
                        		<div class="content">



			<?php 
			$n=0;
			$img= directory_map('assets/upload/');
			foreach ($img as $value) {
			  $n=$n+1;
			  ?>

			<div class="col-lg-3 col-md-4 col-xs-6 thumb" style="min-height: 300px;max-height: 500px;">
                <!-- Trigger the modal with a button -->
                <a class="thumbnail" href="#" data-toggle="modal" data-target="#myModal<?php echo $n ?>" >
                    <img class="img-responsive" src="<?php echo base_url().'assets/upload/'.$value ?>" alt="">
                    <?php echo $value ?>
                </a>
            </div>



           	<?php
           	} ?>

								</div>
							</div>
						</div>
					</div>
				</div>


