<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 
  <!-- Modal -->
  <div class="modal fade" id="resetModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset Pendaftar</h4>
        </div>
        <div class="modal-body">
          <p>Dengan menekan OK semua data peserta akan terhapus secara total dan anda tidak dapat mengembalikan data kembali. Yakin untuk melakukan reset?</p>
        </div>
        <div class="modal-footer">
		
					<?=form_open("")?>
					<input type="hidden" name="reset" value="true" />
					<button type="submit" class="btn btn-danger pull-left">Reset</button>
					</form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
        </div>
		
      </div>
      
    </div>
  </div>
  

