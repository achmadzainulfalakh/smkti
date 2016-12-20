<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<center><p style="margin:20px;padding:20px">Silahkan cetak form ini dan silahkan mengumpulkannya sebagai konfirmasi pendaftaran anda. Simpan juga kode ID pendaftaran anda <code><?=$pendaftar_ID ?></code>, saat form anda hilang atau rusak anda dapat mencetak ulang dengan kode ID pendaftaran anda.<p></center>
	<a href="<?=base_url()?>" class="btn btn-success btn-lg">Form Pendaftaran</a> 
	<a href="<?=base_url().'site/printbukti'?>" class="btn btn-success btn-lg">Cetak</a> 
	</div>
</div>
<div class="clearfix"></div>