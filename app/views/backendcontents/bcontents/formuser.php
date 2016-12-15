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
                                $username='';
                                $password='';
                                $level='';
                                $email='';
                                if ($_POST) {
                                    foreach($this->Users_model->getUser($_POST['id']) as $value){
                                            
                                                $ID=$value->ID;
                                                $username=$value->username;
                                                $password=$value->password;
                                                $password=str_replace(' ','+',$password);
                                                $password=base64_decode($password);
                                                $level=$value->level;
                                                $email=$value->email;
                                            
                                        }
                                }
                                 ?>
                            <?php /*if($this->uri->segment(2)=='edit'){
										foreach($usersdata as $value){ 
										$ID=$value->ID;
										$username=$value->username;
										$password=$value->password;
										$password=str_replace(' ','+',$password);
										$password=base64_decode($password);
										$level=$value->level;
										$email=$value->email;
										}
										} else {
										$ID='';
										$username='';
										$password='';
										$level='';
										$email='';
										}*/ ?>
							<div class="content">
                                <form action=<?php echo base_url()."index.php/users/"?> method="POST">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>" />
                                            </div>
                                        </div>
									</div>
									<div class="row">
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" />
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Level</label>
                                                <input type="text" name="level" class="form-control" placeholder="Level" value="<?php echo $level; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <input name="id" type="hidden"  value="<?php echo $ID ?>">
                                    <input name="act" type="hidden"  value="<?php echo $act ?>">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
							
							<!-- end content -->
							
</div></div></div></div></div>