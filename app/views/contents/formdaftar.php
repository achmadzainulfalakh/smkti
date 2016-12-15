<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="first-container" class="container">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 panel panel-default text-left ">
		
				<div class="panel-body">
					<h1>FORMULIR ONLINE</h1>
					<?=form_open("getvalid")?>
					<input type="hidden" name="id" value="<?php echo time() ?>" />
					<input type="hidden" name="txt_chaptca_real" value="<?php echo $chaptca //input hidden captcha ?>">
					<div class="form-group col-lg-6 col-sm-6 col-md-7 col-xs-12">
					<label >Nama Lengkap* :</label>
					<input type="text" class="form-control" name="nama" placeholder="Contoh: Mohammad Iwan" value="<?php if($_POST){echo $_POST['nama'];}?>" size="20" autofocus /><?php echo form_error('nama'); ?>
					</div>
					<div class="form-group col-lg-6 col-sm-6 col-md-5 col-xs-12">
					<label >Telp/HP* :</label>
					<input type="number" class="form-control" name="nohp" placeholder="Contoh: 08123456789" value="<?php if($_POST){echo $_POST['nohp'];}?>" /><?php echo form_error('nohp'); ?>
					</div><div class="clearfix"></div>
					<div class="form-group col-lg-3 col-sm-6 col-md-5 col-xs-12">
					<label >Tempat Lahir* :</label>
					<input type="text" class="form-control" name="tempatlahir" placeholder="Contoh: Surabaya" value="<?php if($_POST){echo $_POST['tempatlahir'];}?>" /><?php echo form_error('tempatlahir'); ?>
					</div>
					
					<div class="form-group col-lg-3 col-sm-4 col-md-5 col-xs-12">
					<label >Tanggal Lahir* :</label>
					<input type="date" class="form-control" name="tanggallahir" placeholder="Contoh: 10-12-2016"  value="<?php if($_POST){echo $_POST['tanggallahir'];}?>" />
					</div><div class="clearfix"></div>
					<div class="form-group col-lg-3 col-sm-4 col-md-5 col-xs-10">
					<label >Jenis Kelamin* :</label><br>
					<?php
					$options = array(
							'pria'         => 'Pria',
							'wanita'           => 'Wanita',
							'lainnya'        => 'Lainnya',
					);
					if($_POST){
					echo form_dropdown('jeniskelamin', $options, $_POST['jeniskelamin'],'class="form-control"');
					} else {
					echo form_dropdown('jeniskelamin', $options, 'lainnya','class="form-control"');
					}?>		  
					
					</div><div class="clearfix"></div>
					<div class="form-group col-lg-3 col-sm-4 col-md-5 col-xs-10">
					
					<label >Agama* :</label>
					<?php
					$options = array(
							'islam'         => 'Islam',
							'katolik'           => 'Katolik',
							'protestan'         => 'Protestan',
							'budha'        => 'Budha',
							'hindu'        => 'Hindu',
							'lainnya'        => 'Lainnya',
					);
					if($_POST){
					echo form_dropdown('agama', $options, $_POST['agama'],'class="form-control"');
					} else {
					echo form_dropdown('agama', $options, 'lainnya','class="form-control"');
					}?>
					
					</div><div class="clearfix"></div>
					<div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<label >Sekolah Asal* :</label>
					<input type="text" class="form-control" name="asalsekolah" placeholder="Contoh: SMPN Surabaya"  value="<?php if($_POST){echo $_POST['asalsekolah'];}?>" />
					</div><div class="clearfix"></div><!--
					<div class="form-group">
					<label for="email">Email address* :</label>
					<input type="email" class="form-control" name="email" placeholder="Contoh: iwan@gmail.com"  value="<?php if($_POST){echo $_POST['email'];}?>" />
					</div>-->
					
					<div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<label >Alamat Lengkap* :</label>
					<textarea type="text" class="form-control" name="alamatlengkap" placeholder="Tuliskan alamat blok/rt rw, desa, kecamatan, kabupaten, provinsi"  rows="10" cols="30"/><?php if($_POST){echo $_POST['alamatlengkap'];}?></textarea>
					</div><div class="clearfix"></div>
					<div class="form-group col-lg-5 col-sm-6 col-md-7 col-xs-12">
					<label >Nama Ayah/Wali* :</label>
					<input type="text" class="form-control" name="namawali" placeholder="Contoh: Mohammad Hasan" value="<?php if($_POST){echo $_POST['namawali'];}?>" /><?php echo form_error('namawali'); ?>
					</div><div class="clearfix"></div>
					<hr>
					
					<hr>
					<div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<span class="bg-primary text-center " style="font-size:30px;padding:10px"><s><?php echo $chaptca ?></s></span>
					<br/><br/>
					<input type="text" class="" name="txt_chaptca" placeholder="Ketik tulisan diatas" value=""/><?php echo $salahcaptcha ?><?php echo form_error('txt_chaptca'); ?>
					</div>
					<div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<button type="submit" class="btn btn-success btn-lg">Register</button>
					</div>
					</form>
				</div>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1 "></div>
</div>
<div class="clearfix"></div>