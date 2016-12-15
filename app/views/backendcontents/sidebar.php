<div class="sidebar" data-color="purple" data-image="<?php echo base_url().'assets/img/sidebar-5.jpg'?>">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href=<?php echo base_url()."index.php";?> class="simple-text">
                    <?php echo $username;?>
                </a>
            </div>
            <ul class="nav">
                <?php foreach($backmenu as $value){ 
						$activeMenu = '';
                        if ($this->uri->segment(1) == $value['idMenu']) {
                            $activeMenu = 'active';
                        } ?>
                        <li class="<?php echo $activeMenu ?>" >
                        
                            <a href=<?php echo $value['Link']?>>
                                <i <?php echo $value['Classicon']?>></i>
								<p><?php echo $value['Name']?></p>
                            </a>
                        </li>
						<?php }?>
            </ul>
    	</div>
    </div>