
<?php
// echo '<a href="' . get_site_url() . '" class="site-logo"> <img src="' . get_parent_theme_file_uri() . '/img/logo.png' . '" alt="Site Logo" />  </a>';
if (function_exists('the_custom_logo')) {
    the_custom_logo();
} 

