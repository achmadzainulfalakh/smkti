<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-15">
                        <div class="card">

                    <?php
                    foreach ($this->Posts_model->getPost($this->uri->segment(3)) as $value){
                        $idpost=$value->ID;

                    }

                    foreach ($this->Comments_model->getCommentsOnPost($this->uri->segment(3)) as $value) {
                        
                        $data= array('commentator_email' => $value->email);
                        
                        echo '<div class="content">';

                        echo "<blockquote>";
                        $this->load->view('frontendcontents\fcontents\commentgravatar',$data);
                        echo " " . $value->email . "<br/>";
                        echo $value->date . "<br/>";
                        echo $value->content . "<br/>";
                        echo "</blockquote>";
                        echo "</div>";
                        

                    }
                    ?>
							
</div></div>

</div></div></div>