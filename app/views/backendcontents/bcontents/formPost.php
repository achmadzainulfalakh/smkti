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
                                <h4 class="title">Edit Post</h4>
                            </div>
                            <?php 

                            $ID='';
                            $post_name='';
                            $post_title='';
                            $post_subtitle='';
                            $post_content='';
                            $post_link='';
                            $post_status='';
                            $post_author='';
                            $post_update='';
                            if ($_POST) {
                                    foreach($this->Posts_model->getPost($_POST['post_name']) as $value){
                            			$ID=$value->ID;
										$post_name=$value->post_name;
										$post_title=$value->post_title;
										$post_subtitle=$value->post_subtitle;
										$post_content=$value->post_content;
										$post_link=$value->post_link;
										$post_status=$value->post_status;
										$post_author=$value->post_author;
										$post_update=$value->post_update;
										}
							} ?>
                            <div class="content">
                                <form action=<?php echo base_url()."index.php/posts/" ?> method="POST" >
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link</label>
                                                <input name="link" type="text" class="form-control" placeholder="Link" value="<?php echo base_url().'index.php/site/post/'.$post_name ?>" readonly>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>Publish</label>
                                                <input name="publish" type="text" class="form-control" placeholder="Publish" value="<?php echo $post_status ?>">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Update</label>
                                                <input name="lastupdate" type="text" class="form-control" placeholder="Last Update" value="<?php echo $post_update ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input name="title" type="text" class="form-control" placeholder="Post Title" value="<?php echo $post_title ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Subtitle</label>
                                                <input name="subtitle" type="text" class="form-control" placeholder="Subtitle" value="<?php echo $post_subtitle ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Post</label>
                                                <textarea id="ck_editor" name="ck_editor" rows="100" class="form-control" placeholder="Tulis sebuah posting anda disini" ><?php echo $post_content ?></textarea>
                                                 <script>
                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                    // instance, using default configuration.
                                                    CKEDITOR.replace( 'ck_editor' );
                                                </script>   
                                                
												<input name="id" type="hidden"  value="<?php echo $ID ?>">
                                                <input name="act" type="hidden"  value="<?php echo $act ?>">
                                                
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
                                                <input type="text" class="form-control" disabled placeholder="ID" value=<?php echo $ID ?>>
                                            </div>
                                        </div>
                                    </div> 
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Post Name</label>
                                                <input type="text" class="form-control" disabled placeholder="Post Name" value=<?php echo $post_name ?>>
                                            </div>
                                        </div>
									</div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Last Update</label>
                                                <input type="text" class="form-control" disabled placeholder="Post Title" value=<?php echo $post_update ?>>
                                            </div>
                                        </div>
									</div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Author</label>
                                                <input type="text" class="form-control" disabled placeholder="Post Title" value=<?php echo $post_author ?>>
                                            </div>
                                        </div>
									</div>
								</div>
                        </div>
                    </div>


</div></div></div>