<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="first-container" class="container">
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">

				<center>
				<h2>CETAK ULANG</h2>
				<?=form_open("cetak-ulang",array('class'=>'form-inline'))?>
				<div class="panel-body">
					
					<input type="hidden" name="txt_chaptca_real" value="<?php echo $chaptca //input hidden captcha ?>">
					<div class="form-group">
					<input type="text" class="form-control" name="id" placeholder="id pendaftaran anda" value="<?php if($_POST){echo $_POST['id'];}?>" /><?php echo form_error('id'); ?>
					</div>
					
										
				</div>
					<div class="form-group">
					<div class="alert alert-info" style="font-size:20px;"><s><?php echo $chaptca ?></s></div>
					
					<input type="text" class="form-control" name="txt_chaptca" placeholder="Captcha => enter" value=""/><?php echo $salahcaptcha ?><?php echo form_error('txt_chaptca'); ?>
					</div>
					<div class="form-group">
					<button type="submit" class="btn btn-success hidden-lg hidden-sm hidden-md hidden-xs">Cetak Ulang</button>
					</div>
				</form>
				</center>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
</div>
<div class="clearfix"></div>