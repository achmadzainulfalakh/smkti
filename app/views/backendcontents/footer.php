<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div></div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <?php foreach($this->Menus_model->getMenus() as $value){ 
						?>
							<li class="<?php //echo $value['']?>" onclick="">
								<a href="<?php echo base_url()."index.php/site/".$value->link ?>" ><?php echo $value->text ?></a>
							</li> 
                        <?php
						} ?>
						<?php //foreach($frontmenu as $value){ ?>
						<!--<li>
                            <a href=<?php //echo $value['link']?>>
                                <?php //echo $value['text']?>
                            </a>
                        </li>-->
						<?php //} ?>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    <?php echo $this->Front_model->getConsite("copyrightfooter"); ?>
                </p>
            </div>
        </footer>

    </div>
</div>

<?php echo empty($modal) ;?>

</body>

    <!--   Core JS Files   -->
    <script src=<?php echo base_url()."assets/js/jquery-1.10.2.js"?> type="text/javascript"></script>
	<script src=<?php echo base_url()."assets/js/bootstrap.min.js"?> type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src=<?php echo base_url()."assets/js/bootstrap-checkbox-radio-switch.js"?>></script>

	<!--  Charts Plugin -->
	<script src=<?php echo base_url()."assets/js/chartist.min.js"?>></script>

    <!--  Notifications Plugin    -->
    <script src=<?php echo base_url()."assets/js/bootstrap-notify.js"?>></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
	<!-- Light Bootstrap -->
	<script src=<?php echo base_url()."assets/js/light-bootstrap-dashboard.js"?>></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<?php //<script src=<?php //echo base_url()."assets/js/demo.js"?></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Selamat datang di <b>Dashboard</b> - anda terlihat menyenangkan hari ini."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>