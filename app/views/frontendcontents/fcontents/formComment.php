<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#formcomment">
  Comment post
</button>

<div id="formcomment" class="content collapse">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-15">
                        <div class="card">
                            							
							<!-- content -->
							<div class="header">
                                <h4 class="title">Comment This Post:</h4>
                            </div>
                            <div class="content">
                                <form action=<?php echo base_url()."index.php/site/post/". $this->uri->segment(3) ?> method="POST" >
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input name="name" type="text" class="form-control" placeholder="Nama" value="" required="" />
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" placeholder="Email" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Website (optional)</label>
                                                <input name="website" type="text" class="form-control" placeholder="Website" value="" required="">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea name="ck_editor" rows="10" class="form-control" placeholder="Tulis sebuah komentar anda disini" required="" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <input name="post_name" type="hidden"  value="<?php echo $this->uri->segment(3) ?>">
                                    <input name="act" type="hidden"  value="add">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>							
							<!-- end content -->
							
</div></div>

</div></div></div>

<br/><br/>