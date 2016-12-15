<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    
					<?php
					foreach ($post as $value){
					echo "<div class='post-preview'>";
					echo "<a href=$value->post_link>";
					echo "<h2 class='section-heading'>$value->post_title</h2>";
					echo "</a>";
					echo "<p>$value->post_content</p>";
					echo "<p class='post-meta'>Posted by <a href=''>$value->post_author</a>, last update on $value->post_update</p>";
					echo "</div>";
					}

					?>
					
                </div>
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php echo $formcomment;?>
                <?php echo $comments;?>
                </div>
            </div>
        </div>
    </article>

    <hr>