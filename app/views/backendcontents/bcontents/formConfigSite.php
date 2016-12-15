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
                                <h4 class="title">Config</h4>
                            </div>
                            <div class="content">
                                <form action=<?php echo base_url()."index.php/consite/"?> method="POST" >
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Site Name</p>
										</div>
										<div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Site Name" value="<?php echo $this->Conf_model->getConf("name","sitename") ?>" name="sitename">
                                        </div>
									</div>
									<div class="row">
                                        <div class="col-md-3">
                                            <p>Slogan</p>
										</div>
										<div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Slogan" value="<?php echo $this->Conf_model->getConf("name","selogan") ?>" name="selogan">
                                        </div>
									</div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Author</p>
										</div>
										<div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Author" value="<?php echo $this->Conf_model->getConf("name","author") ?>" name="author">
                                        </div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<p>Street</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Street" value="<?php echo $this->Conf_model->getConf("name","street") ?>" name="street">
                                        </div>
									</div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Copy Right</p>
                                        </div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Copy Right" value="<?php echo $this->Conf_model->getConf("name","copyrightfooter") ?>" name="copyrightfooter">
                                        </div>
                                    </div>
									<label>Contact :</label>
									<div class="row">
										<div class="col-md-3">
											<p>Telephone</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Telephone" value="<?php echo $this->Conf_model->getConf("name","telp") ?>" name="telp">
                                        </div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<p>Link Author</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Link Author" value="<?php echo $this->Conf_model->getConf("name","linkauthor") ?>" name="linkauthor">
                                        </div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<p>HP</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="HP" value="<?php echo $this->Conf_model->getConf("name","hp") ?>" name="hp">
                                        </div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<p>Email</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Email" value="<?php echo $this->Conf_model->getConf("name","email") ?>" name="email">
                                        </div>
									</div>
									<label>Link :</label>
									<div class="row">
										<div class="col-md-3">
											<p>Facebook</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Facebook" value="<?php echo $this->Conf_model->getConf("name","linkfb") ?>" name="linkfb">
                                        </div>
									</div>									
									<div class="row">
										<div class="col-md-3">
											<p>Twitter</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Twitter" value="<?php echo $this->Conf_model->getConf("name","linktwitter") ?>" name="linktwitter">
                                        </div>
									</div>									
									<div class="row">
										<div class="col-md-3">
											<p>Youtube</p>
										</div>
                                        <div class="col-md-8">       
                                            <input type="text" class="form-control" placeholder="Youtube" value="<?php echo $this->Conf_model->getConf("name","linkyoutube") ?>" name="linkyoutube">
                                        </div>
									</div>
                                    



                                    <input name="act" type="hidden" value="updateConsite" />
                                    
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
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
                                                <label>Author : <b><?php echo $this->Conf_model->getConf("name","author") ?></b><label>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Facebook : <b><?php echo $this->Conf_model->getConf("name","linkfb") ?></b></label>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Telephone : <b><?php echo $this->Conf_model->getConf("name","telp") ?></b></label>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Link Author : <b><?php echo $this->Conf_model->getConf("name","linkauthor") ?></b></label>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Twitter : <b><?php echo $this->Conf_model->getConf("name","linktwitter") ?></b></label>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>HP : <b><?php echo $this->Conf_model->getConf("name","hp") ?></b></label>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email : <b><?php echo $this->Conf_model->getConf("name","email") ?></b></label>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Youtube : <b><?php echo $this->Conf_model->getConf("name","linkyoutube") ?></b></label>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Street : <b><?php echo $this->Conf_model->getConf("name","street") ?></b></label>
                                            </div>
                                        </div>
                                    </div>
									
                            </div>
</div></div>



</div></div></div>