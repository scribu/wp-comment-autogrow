<?php
/*
Plugin Name: Comment Autogrow
Version: 1.0.1b
Description: Makes the comment textarea expand in height automatically
Author: scribu
Author URI: http://scribu.net
Plugin URI: http://scribu.net/wordpress/comment-autogrow

Copyright (C) 2009 scribu.net (scribu AT gmail DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

#add_action('wp_head', 'firebug');

function firebug()
{ 
	if ( !is_single() )
		return;
?>
<script type='text/javascript' src='http://getfirebug.com/releases/lite/1.2/firebug-lite-compressed.js'></script>
<?php
}


commentAutogrow::init();

class commentAutogrow
{
	function init()
	{
		add_action('template_redirect', array(__CLASS__, 'script'));
	}

	function script()
	{
		$cond = ( is_single() || is_page() ) && $GLOBALS['post']->comment_status == 'open';

		if ( !$cond )
			return;

		$url = plugins_dir_url(__FILE__);

		wp_register_script('autogrow', $url . 'autogrow.js', array('jquery'), '1.2.5', true);
		wp_enqueue_script('comment-autogrow', $url . 'init.js', array('autogrow'), '1.0.1', true);
	}
}

// WP < 2.8
if ( !function_exists('plugins_dir_url') ) :
function plugins_dir_url($file) {
	// WP < 2.7
	if ( !function_exists('plugins_url') )
		return trailingslashit(get_option('siteurl') . '/wp-content/plugins/' . plugin_basename($file));

	return trailingslashit(plugins_url(plugin_basename(dirname($file))));
}
endif;

