<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="first-container" class="container">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 panel panel-default text-left ">
	{form_entries}
				<div class="panel-body">
					<div class="center-block">
					<h1>SMKTI ANNAJIYAH TAMBAKBERAS JOMBANG</h1>
					<h4>Pendaftaran Online</h4>
					</div>
					<label >ID :</label> {ID}
					<br/><br/>
					<label >Nama Lengkap :</label> {nama}
					<br/>
					<label >Tempat Lahir :</label> {tempatlahir}
					<br/>
					
					<label >Tanggal Lahir :</label> {tanggallahir}
					<br/>
					<label >Jenis Kelamin :</label> {jeniskelamin}
					<br/>
					<label >Agama :</label> {agama}
					<br/>
					<label >Asal Sekolah :</label> {asalsekolah}
					<br/>
					<label >Alamat Lengkap :</label> {alamatlengkap}
					<br/>
					<!--
					<div class="form-group">
					<label >Tanggal Lahir* :</label>
					<input type="text" class="form-control" name="tanggallahir" placeholder="Contoh: 10-12-2016" required value="<?php if($_POST){echo $_POST['tanggallahir'];}?>" />
					</div>
					<div class="form-group">
					<label >Jenis Kelamin* :</label>
					<input type="text" class="form-control" name="jeniskelamin" placeholder="Contoh: Laki-laki" required value="<?php if($_POST){echo $_POST['jeniskelamin'];}?>" />
					</div>
					<div class="form-group">
					<label >Agama* :</label>
					<input type="text" class="form-control" name="agama" placeholder="Contoh: Islam" required value="<?php if($_POST){echo $_POST['agama'];}?>" />
					</div>
					<div class="form-group">
					<label >Sekolah Asal* :</label>
					<input type="text" class="form-control" name="asalsekolah" placeholder="Contoh: SMPN Surabaya" required value="<?php if($_POST){echo $_POST['asalsekolah'];}?>" />
					</div>
					<div class="form-group">
					<label for="email">Email address* :</label>
					<input type="email" class="form-control" name="email" placeholder="Contoh: iwan@gmail.com" required value="<?php if($_POST){echo $_POST['email'];}?>" />
					</div>
					<div class="form-group">
					<label >Alamat Lengkap* :</label>
					<input type="text" class="form-control" name="alamat" placeholder="Tuliskan alamat blok/rt rw, desa, kecamatan, kabupaten, provinsi" required value="<?php if($_POST){echo $_POST['alamat'];}?>" />
					</div>-->
					<label >Nama Wali :</label> {namawali}
					<br/>
					<label >HP :</label> {nohp}
					<br/>
					<div class="form-group">
					
					<!--<a href="<?//=base_url().'print.html?id='.$_SESSION['id']?>" class="btn btn-info btn-lg pull-right">Cetak</a>-->
					</div>
					
				</div>
	{/form_entries}
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1 "></div>
</div>
<div class="clearfix"></div>
