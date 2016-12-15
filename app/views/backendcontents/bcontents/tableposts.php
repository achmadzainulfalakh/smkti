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
                                <h4 class="title">Table Posts <?php echo "<a href=".base_url()."index.php/posts/add class='btn btn-xs btn-default'>New Post</a>";?></h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Post Title</th>
                                    	<th>Post Status</th>
										<th>Post Author</th>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($posts)){
										foreach($posts as $value){ ?>
										<tr>
                                        	<td><?php echo $value->ID;?></td>
                                        	<td><?php echo $value->post_title;?></td>
                                        	<td><?php echo $value->post_status;?></td>
											<td><?php echo $value->post_author;?></td>
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
                                                            <form method="post" action="<?php echo base_url().'index.php/posts/edit'?>">
                                                            <input name="act" type="hidden" value="edit" />
                                                            <input name="id" type="hidden" value="<?php echo $value->ID;?>" />
                                                            <input name="post_name" type="hidden" value="<?php echo $value->post_name;?>" />
                                                            
                                                            <input type="submit" value="Edit" class="list-group-item" style="width: 100%;" />
                                                            </form>
                                                            </li>
                                                            <li>
                                                            <form method="post" action="">
                                                            <input name="act" type="hidden" value="delete" />
                                                            <input name="id" type="hidden" value="<?php echo $value->ID;?>"
                                                            <input name="post_name" type="hidden" value="<?php echo $value->post_name;?>" />
                                                            
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