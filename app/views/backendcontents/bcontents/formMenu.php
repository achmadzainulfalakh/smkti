<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            							
							<!-- content -->
							<div class="header">
                                <h4 class="title"><?php echo $formtitle?></h4>
                            </div>
                            <?php 
                                $ID='';
                                $text='';
                                $link='';
                                $order='';
                                if ($_POST) {
                                    foreach($this->Menus_model->getMenu($_POST['id']) as $value){
                                            
                                                $ID=$value->ID;
                                                $text=$value->text;
                                                $link=$value->link;
                                                $order=$value->order;
                                            
                                        }
                                }
                                 ?>
                            <div class="content">
                                <form action=<?php echo base_url()."index.php/menus/"?> method="POST" >
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Text: </label>
                                                <input name="text" type="text" class="form-control" placeholder="Text" value="<?php echo $text ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Link: <?php echo base_url()."index.php/site/" ?></label>
                                                <input name="link" type="text" class="form-control" placeholder="Link" value="<?php echo $link ?>">
                                            </div>
                                        </div>
                                        										
                                    </div>
                                    <div class="row">
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Order: </label>
                                                <input name="order" type="text" class="form-control" placeholder="Order" value="<?php echo $order ?>">
                                            </div>
                                        </div>
                                    </div>
									
                                    <input name="id" type="hidden"  value="<?php echo $ID ?>">
                                    <input name="act" type="hidden"  value="<?php echo $act ?>">
                                    <button type="submit" class="btn btn-info btn-fill pull-left">Save</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>							
							
							<!-- end content -->
							
</div></div>

<div class="col-md-4">
                        <div class="card">
								<div class="content">
									<div class="row">
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" class="form-control" disabled placeholder="ID" value=<?php echo $ID ?>>
                                            </div>
                                        </div>
                                    </div> 
									
								</div>
                        </div>
                    </div>


</div></div></div>