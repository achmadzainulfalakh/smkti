<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="first-container" class="container">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 panel panel-default text-left ">
		
				<div class="panel-body">
					<h1>FORMULIR ONLINE</h1>
					<?php echo $error;?>

					<?php echo form_open_multipart('upload/do_upload');?>

					<input type="file" name="userfile" size="20" />

					<br /><br />

					<input type="submit" value="upload" />

					</form>
				</div>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1 "></div>
</div>
<div class="clearfix"></div>