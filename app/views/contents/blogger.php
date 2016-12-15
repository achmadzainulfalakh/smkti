<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div id="content"></div>
    <script>
      function handleResponse(response) {
        document.getElementById("content").innerHTML += "<h1>" + response.title + "</h1>" + response.name ;
      }
    </script>
    <script
    src="https://www.googleapis.com/blogger/v3/blogs/9177850868960673665?key=AIzaSyDPc5xd-3kxqhRtQlRqW2TlN03A1z5GuBI"></script>


