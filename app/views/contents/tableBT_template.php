<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container">

      <div class="starter-template">
        <h1>{table_title}</h1>
		<h5>{table_heading}</h5>
        
		<br/><hr>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Nama</th>
					<th>HP</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Asal Sekolah</th>
					<th>Alamat Lengkap</th>
					<th>Nama Wali</th>
				  </tr>
				</thead>
				<tbody>{table_entries}
				  <tr>
					<td class="text-left">{ID}</td>
					<td class="text-left">{nama}</td>
					<td class="text-left">{nohp}</td>
					<td class="text-left">{tempatlahir}</td>
					<td class="text-left">{tanggallahir}</td>
					<td class="text-left">{jeniskelamin}</td>
					<td class="text-left">{agama}</td>
					<td class="text-left">{asalsekolah}</td>
					<td class="text-left">{alamatlengkap}</td>
					<td class="text-left">{namawali}</td>
				  </tr>{/table_entries}
				</tbody>
			  </table>
		  
		<?//=$pagination?><!--
		<ul class="pagination">
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul>-->
		
	  </div>
	  

    </div><!-- /.container -->

