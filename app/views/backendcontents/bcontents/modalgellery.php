<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

      <?php 
      $n=0;
      $img= directory_map('assets/upload/');
      foreach ($img as $value) {
        $n=$n+1;
        ?>
<div class="container">
   <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $n ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $value ?></h4>
        </div>
        <div class="modal-body">
          <p><?php echo base_url().'assets/upload/'.$value ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
</div>
<?php
            } ?>