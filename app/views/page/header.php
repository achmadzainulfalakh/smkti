<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()?>">SMKTI ANNAJIYAH</a>
        </div>
		
        <div id="navbar" class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <?php foreach($menu as $value){ ?>
			<?=$value?>
			<?php }?>
          </ul>
        </div><!--/.nav-collapse --> 
      </div>
    </nav>