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
                                $content='';
                                $date='';
                                $ID_user='';
                                $email='';
                                $ID_post='';
                                $post_name='';
                                $aprove='';
                            if ($_POST) {
                                foreach($this->Comments_model->getComment($_POST['id']) as $value){
                                    $ID=$value->ID;
                                    $content=$value->content;
                                    $date=$value->date;
                                    $ID_user=$value->ID_user;
                                    $email=$value->email;
                                    $ID_post=$value->ID_post;
                                    $post_name=$value->post_name;   
                                    $aprove=$value->aprove;                                  
                                    }
                            }
                                 ?>
                            <div class="content">
                                <form action=<?php echo base_url()."index.php/comments/"?> method="POST" >
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ID Comment</label>
                                                <input name="id" type="text" class="form-control" placeholder="ID Comment" value="<?php echo $ID ?>" readonly>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>ID Post</label>
                                                <input name="idpost" type="text" class="form-control" placeholder="ID Post" value="<?php echo $ID_post ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Post Name</label>
                                                <input name="postname" type="text" class="form-control" placeholder="Post Name" value="<?php echo $post_name ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>ID User</label>
                                                <input name="iduser" type="text" class="form-control" placeholder="ID User" value="<?php echo $ID_user ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Aprove</label>
                                                <input name="aprove" type="text" class="form-control" placeholder="aprove" value="<?php echo $aprove ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea id="ck_editor" name="ck_editor" rows="100" class="form-control" placeholder="Tulis sebuah komentar anda disini" ><?php echo $content ?></textarea>
                                                 <script>
                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                    // instance, using default configuration.
                                                    CKEDITOR.replace( 'ck_editor' );
                                                </script>   
                                                
												<?php //echo '<input name="ID" type="hidden"  value=" $ID ">' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
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
                                                <input type="text" class="form-control" disabled placeholder="ID" value=<?php //echo $ID ?>>
                                            </div>
                                        </div>
                                    </div> 
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Post Name</label>
                                                <input type="text" class="form-control" disabled placeholder="Post Name" value=<?php //echo $post_name ?>>
                                            </div>
                                        </div>
									</div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Last Update</label>
                                                <input type="text" class="form-control" disabled placeholder="Last Update" value="<?php echo $date ?>">
                                            </div>
                                        </div>
									</div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Aprove</label>
                                                <input type="text" class="form-control" disabled placeholder="Aprove" value="<?php //echo $aprove ?>">
                                            </div>
                                        </div>
									</div>
								</div>
                        </div>
                    </div>


</div></div></div>