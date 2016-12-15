<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$gravatar = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim($commentator_email))) . '?s=64';
echo '<img src="' . $gravatar . '" />';
