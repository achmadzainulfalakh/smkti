<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<div class="content">
            <div class="container-fluid">-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            							
							<!-- content -->
							<div class="header">
                                <h4 class="title"><?php echo $formtitle?> <?php echo "<a href='".base_url()."index.php/menus/add' class='btn btn-xs btn-default'>New Menu</a>";?></h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Text</th>
                                    	<th>Link</th>
                                        <th>Order</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($menus)){
										foreach($menus as $value){ 
                                            $id=md5($value->ID);
                                            ?>

										
                                        <tr>
                                        	<td><?php echo $value->ID;?></td>
                                            
                                        	<td><?php echo $value->text;?></td>
                                        	<td><?php echo base_url()."index.php/site/".$value->link;?></td>
                                            <td><?php echo $value->order;?></td>
											<td>
											<div class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav navbar-left">
                                                    <li class="dropdown">
                                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="pe-7s-tools"></i>
                                                                <b class="caret"></b>
                                                                <span class="notification"></span>
                                                          </a>
                                                          <ul class="dropdown-menu">
                                                            <li>
                                                            <form method="post" action="<?php echo base_url().'index.php/menus/edit'?>">
                                                            <input name="act" type="hidden" value="editMenu" />
                                                            <input name="id" type="hidden" value="<?php echo $value->ID;?>" />
                                                            
                                                            <input type="submit" value="Edit" class="list-group-item" style="width: 100%;" />
                                                            </form>
                                                            </li>
                                                            <li>
                                                            <form method="post" action="">
                                                            <input name="act" type="hidden" value="deleteMenu" />
                                                            <input name="id" type="hidden" value="<?php echo $value->ID;?>" />
                                                            
                                                            <input type="submit" value="Delete" class="list-group-item" style="width: 100%;"  />
                                                            </form>
                                                            </li>
                                                            
                                                          </ul>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            </td>
                                        </tr>
                                        
										<?php }
										} ?>
                                    </tbody>
                                </table>

                            </div>
							<!-- end content -->
							
</div></div></div><!--</div></div>-->