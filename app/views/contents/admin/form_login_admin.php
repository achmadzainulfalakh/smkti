<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<div id="first-container" class="container" style="padding:80px 0px">
	<div class="row  ">
		<div class="col-lg-3 col-md-3 col-sm-2 col-xs-2"></div>
		<div class="col-lg-5 col-md-5 col-sm-8 col-xs-8">
			<div class="panel panel-default ">
				<div class="panel-heading"><h1>Administrator</h1></div>

			<!-- form -->
			<div class="login-page  panel-body">
			  <div class="form ">
				<?php $attributes = array('class' => 'register-form', 'id' => 'form1'); ?>
				<?=form_open(base_url()."login.html",$attributes) ?>
					
					<div class="form-group">
						<input class="form-control" type="email" placeholder="email address" name="email" required/>
					</div>
					<div class="form-group">
					<button class="btn btn-success btn-lg pull-right" type="submit">create</button>
					<p class="message">Already registered? 
					<a href="#" 
					onclick="document.getElementById('form1').style.display = 'none';
					document.getElementById('form2').style.display = 'block';">Sign In</a></p>
					</div>
				</form>
				
				<?php $hidden = array('form' => 'login'); ?>
				<?php $attributes = array('class' => 'login-form collapse', 'id' => 'form2'); ?>
				<?=form_open(base_url()."login/validasi.html",$attributes, $hidden) ?>
					<div class="form-group">
						<input class="form-control" type="text" placeholder="username" name="username" required/>
					</div>
					<div class="form-group">
						<input class="form-control" type="password" placeholder="password" name="password" required/>
					</div>
					<div class="form-group">
					<button class="btn btn-success btn-lg pull-right" type="submit">login</button>
					<p class="message">Not registered? <a href="#" 
					onclick="document.getElementById('form1').style.display = 'block';
					document.getElementById('form2').style.display = 'none'">Create an account</a></p>
					</div>
				</form>
				<?php 
				  if (!$pesan==""){ ?>
				  <p class="message" style="background-color: #63d8f1;padding: 10px;color: #ffffff;border-radius: 5px;">
				  <b><?php echo $pesan?></b>
				  </p><br/>
				  <?php
				  }
				  ?>
			  </div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>